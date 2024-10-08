<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Device;
use App\Models\Report;
use App\Models\Location;
use App\Models\Measurement;
use App\Models\TrainProfile;
use Illuminate\Bus\Queueable;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Enums\Format;
use App\Events\GeneratedReportEvent;
use Illuminate\Support\Facades\File;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $reportId;
    protected $startDate;
    protected $endDate;

    /**
     * Create a new job instance.
     */
    public function __construct($reportId, $startDate, $endDate)
    {
        $this->reportId = $reportId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $reportsDirectory = base_path('public/reports');
        $start = Carbon::create($this->startDate)->format("Y_m_d_H_i");
        $end = Carbon::create($this->endDate)->format("Y_m_d_H_i");

        if (!File::exists($reportsDirectory)) {
            File::makeDirectory($reportsDirectory, 0755, true);
        }
        $pdfFilePath = $reportsDirectory . "/" . "Report_" . $start . "_" . $end . ".pdf";

        $trains = TrainProfile::with('stations')->get();
        $devices = Device::selectRaw('*, ST_X(last_location::geometry) AS longitude, ST_Y(last_location::geometry) AS latitude')->get();
        foreach ($devices as $device) {
            if ($device->last_monitored_value != null) {
                $device->last_monitored_value = json_decode($device->last_monitored_value, true);
            }
        }
        $locations = Location::selectRaw('*, ST_X(point::geometry) AS longitude, ST_Y(point::geometry) AS latitude')
            ->where('datetime', '>=', $this->startDate)->where('datetime', '<=', $this->endDate)
            ->get();
        $measurements = Measurement::orderBy('created_at', 'desc')
            ->where('datetime', '>=', $this->startDate)->where('datetime', '<=', $this->endDate)
            ->get();
            $calculatedMeasurements = Measurement::selectRaw("device_id, key, MIN(value) as minimum, MAX(value) as maximum, AVG(value) as average, unit")
            ->where('datetime', '>=', $this->startDate)
            ->where('datetime', '<=', $this->endDate)
            ->groupByRaw('device_id, key, unit')
            ->orderBy('device_id')
            ->get();

        Pdf::view('report-all', [
            "trains" => $trains,
            "devices" => $devices,
            "locations" => $locations,
            "measurements" => $measurements,
            "calculatedMeasurements" => $calculatedMeasurements,
            "startDate" => Carbon::create($this->startDate)->format("d F Y g:i A"),
            "endDate" => Carbon::create($this->endDate)->format("d F Y g:i A")
        ])
            ->footerView('pdf.layout.footer')
            ->withBrowsershot(function (Browsershot $browsershot) {
                $browsershot
                    ->setNodeBinary(getenv('BROWSERSHOT_NODE_PATH'))
                    ->setNpmBinary(getenv('BROWSERSHOT_NPM_PATH'))
                    ->setChromePath(getenv('BROWSERSHOT_CHROME_PATH'));
            })
            ->margins(10, 10, 10, 10)
            ->format(Format::A4)
            ->landscape()
            ->save($pdfFilePath);

        $report = Report::find($this->reportId);
        if ($report) {
            $report->file = "reports/Report_" . $start . "_" . $end . ".pdf";
            $report->name = "Report_" . $start . "_" . $end . ".pdf";
            $report->save();
            event(new GeneratedReportEvent("success", "Report generated"));
        } else {
            throw new \Exception("Report with ID {$this->reportId} not found");
        }
    }
}

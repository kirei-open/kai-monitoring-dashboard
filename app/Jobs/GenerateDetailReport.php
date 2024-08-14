<?php

namespace App\Jobs;

use App\Events\GeneratedReportEvent;
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
use Illuminate\Support\Facades\File;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateDetailReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;
    protected $reportId;
    protected $startDate;
    protected $endDate;

    /**
     * Create a new job instance.
     */
    public function __construct($id, $reportId, $startDate, $endDate)
    {
        $this->id = $id;
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
        $now = Carbon::now()->format('Y-m-d(h_i_s)');

        if (!File::exists($reportsDirectory)) {
            File::makeDirectory($reportsDirectory, 0755, true);
        }
        $pdfFilePath = $reportsDirectory . "/" . "Device_" . $this->id . "_" . $now . ".pdf";

        $train = TrainProfile::with('stations')->where('device_id', $this->id)->first();
        $device = Device::selectRaw('*, ST_X(last_location::geometry) AS longitude, ST_Y(last_location::geometry) AS latitude')->where('serial_number', $this->id)->first();
        $device->last_monitored_value = json_decode($device->last_monitored_value, true);
        $locations = Location::selectRaw('*, ST_X(point::geometry) AS longitude, ST_Y(point::geometry) AS latitude')
            ->where('device_id', $this->id)->orderBy('created_at', 'desc')
            ->where('datetime', '>=', $this->startDate)->where('datetime', '<=', $this->endDate)
            ->get();
        $measurements = Measurement::where('device_id', $this->id)->orderBy('created_at', 'desc')
            ->where('datetime', '>=', $this->startDate)->where('datetime', '<=', $this->endDate)
            ->get();
        $calculatedMeasurements = Measurement::selectRaw("key, MIN(value) as minimum, MAX(value) as maximum, AVG(value) as average, unit")
            ->where('device_id', $this->id)
            ->where('datetime', '>=', $this->startDate)->where('datetime', '<=', $this->endDate)
            ->groupByRaw('key, unit')
            ->get();
        Pdf::view('report', [
            "train" => $train,
            "devices" => $device,
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
            $report->file = "reports/Device_" . $this->id . "_" . $now . ".pdf";
            $report->name = "Device_" . $this->id . "_" . $now . ".pdf";
            $report->save();
            event(new GeneratedReportEvent("success", "Report generated"));
        } else {
            throw new \Exception("Report with ID {$this->reportId} not found");
        }
    }
}

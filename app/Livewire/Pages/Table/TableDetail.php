<?php

namespace App\Livewire\Pages\Table;

use App\Models\Device;
use App\Models\Location;
use App\Models\Measurement;
use App\Models\TrainProfile;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Enums\Format;
use Spatie\LaravelPdf\Facades\Pdf;

class TableDetail extends Component
{

    public $id;

    public function mount($id)
    {
        $this->id($id);
    }

    public function render()
    {
        $train = TrainProfile::with('stations')->where('device_id', $this->id)->first();
        $device = Device::selectRaw('*, ST_X(last_location::geometry) AS longitude, ST_Y(last_location::geometry) AS latitude')->where('serial_number', $this->id)->first();
        $device->last_monitored_value = json_decode($device->last_monitored_value, true);
        $locations = Location::selectRaw('*, ST_X(point::geometry) AS longitude, ST_Y(point::geometry) AS latitude')->where('device_id', $this->id)->orderBy('created_at', 'desc')->paginate(5, pageName: 'locationsPage');
        $measurements = Measurement::where('device_id', $this->id)->orderBy('created_at', 'desc')->paginate(5, pageName: 'measurementsPage');
        return view('livewire.pages.table.table-detail', ['train' => $train, 'device' => $device, 'locations' => $locations, 'measurements' => $measurements]);
    }

    public function generatePdf()
    {
        $reportsDirectory = base_path('public/reports');

        if (!File::exists($reportsDirectory)) {
            File::makeDirectory($reportsDirectory, 0755, true);
        }
        $pdfFilePath = $reportsDirectory . "/" . "Test" . ".pdf";

        $train = TrainProfile::with('stations')->where('device_id', $this->id)->first();
        $device = Device::selectRaw('*, ST_X(last_location::geometry) AS longitude, ST_Y(last_location::geometry) AS latitude')->where('serial_number', $this->id)->first();
        $device->last_monitored_value = json_decode($device->last_monitored_value, true);
        $locations = Location::selectRaw('*, ST_X(point::geometry) AS longitude, ST_Y(point::geometry) AS latitude')->where('device_id', $this->id)->orderBy('created_at', 'desc')->paginate(5, pageName: 'locationsPage');
        $measurements = Measurement::where('device_id', $this->id)->orderBy('created_at', 'desc')->paginate(5, pageName: 'measurementsPage');
        $calculatedMeasurements = Measurement::selectRaw("key, MIN(value) as minimum, MAX(value) as maximum, AVG(value) as average, unit")
                                ->where('device_id', $this->id)
                                ->groupByRaw('key, unit')
                                ->get();
        Pdf::view('report',[
            "train" => $train, 
            "devices" => $device,
            "locations" => $locations,
            "measurements" => $measurements,
            "calculatedMeasurements" => $calculatedMeasurements
        ])
        ->footerView('pdf.layout.footer')
        ->withBrowsershot(function (Browsershot $browsershot) {
            $browsershot                    
            ->setNodeBinary(getenv('BROWSERSHOT_NODE_PATH'))
            ->setNpmBinary(getenv('BROWSERSHOT_NPM_PATH'))
            ->setChromePath(getenv('BROWSERSHOT_CHROME_PATH'))
            ;
        })
        ->margins(10, 10, 10, 10)
        ->format(Format::A4)
        ->landscape()
        ->save($pdfFilePath);
    }
}

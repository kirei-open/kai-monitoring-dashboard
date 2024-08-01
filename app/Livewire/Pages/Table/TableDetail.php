<?php

namespace App\Livewire\Pages\Table;

use App\Models\Device;
use App\Models\Location;
use App\Models\Measurement;
use App\Models\TrainProfile;
use Livewire\Component;

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
}

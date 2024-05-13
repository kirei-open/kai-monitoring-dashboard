<?php

namespace App\Livewire;

use App\Models\Device;
use App\Models\Location;
use App\Models\Measurement;
use Livewire\Component;

class TableDetailComponent extends Component
{
    public $id;

    public function mount($id){
        $this->id($id);
    }

    public function render()
    {
        $device = Device::selectRaw('*, ST_X(last_location::geometry) AS longitude, ST_Y(last_location::geometry) AS latitude')->where('serial_number', $this->id)->first();
        $device->last_monitored_value = json_decode($device->last_monitored_value, true);
        $locations = Location::selectRaw('*, ST_X(point::geometry) AS longitude, ST_Y(point::geometry) AS latitude')->where('device_id', $this->id)->paginate(5, pageName: 'locationsPage'); 
        $measurements = Measurement::where('device_id', $this->id)->paginate(5, pageName: 'measurementsPage');
        return view('livewire.table-detail-component', ['device' => $device, 'locations' => $locations, 'measurements' => $measurements]);
    }

}

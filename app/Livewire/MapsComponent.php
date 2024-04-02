<?php

namespace App\Livewire;

use App\Models\Device;
use App\Models\Station;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class MapsComponent extends Component
{
    public function render()
    {
        $stations = Station::selectRaw('*, ST_X(point::geometry) AS longitude, ST_Y(point::geometry) AS latitude')->get();

        $devices = Device::selectRaw('*, ST_X(last_location::geometry) AS longitude, ST_Y(last_location::geometry) AS latitude')->get();

        return view('livewire.maps-component',[
            "stations" => $stations,
            "devices" => $devices,
        ]);
    }
}

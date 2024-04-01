<?php

namespace App\Livewire;

use App\Models\Station;
use Livewire\Component;

class MapsComponent extends Component
{
    public function render()
    {
        $stations = Station::all();

        return view('livewire.maps-component',[
            "stations" => $stations,
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Station;
use Livewire\Component;

class MapsComponent extends Component
{
    public function render()
    {
        $station = Station::all();
        
        return view('livewire.maps-component',[
            "station" => $station,
        ]);
    }
}

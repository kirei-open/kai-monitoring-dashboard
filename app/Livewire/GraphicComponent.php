<?php

namespace App\Livewire;

use App\Models\Measurement;
use Livewire\Component;

class GraphicComponent extends Component
{
    public function render()
    {
        $device_id = Measurement::groupBy('device_id')->pluck('device_id', 'device_id');
        return view('livewire.graphic-component',['device_id' => $device_id]);
    }
}

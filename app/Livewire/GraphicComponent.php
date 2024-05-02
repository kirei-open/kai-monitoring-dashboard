<?php

namespace App\Livewire;

use App\Models\Device;
use Livewire\Component;

class GraphicComponent extends Component
{
    public function render()
    {
        $device_id = Device::groupBy('serial_number')->pluck('serial_number', 'serial_number');
        return view('livewire.graphic-component',['device_id' => $device_id]);
    }
}

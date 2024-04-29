<?php

namespace App\Livewire;

use App\Models\Measurement;
use Livewire\Component;

class GraphicComponent extends Component
{
    public $tempData;

    public function render()
    {
        $tempData = Measurement::where('key','temp')->get();
        dd($tempData);
        return view('livewire.graphic-component');
    }
}

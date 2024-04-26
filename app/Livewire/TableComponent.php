<?php

namespace App\Livewire;

use App\Models\Device;
use Livewire\Component;
use App\Models\Location;
use App\Models\Measurement;
use Livewire\WithPagination;

class TableComponent extends Component
{
    use WithPagination;
    
    public $locations;

    public function mount()
    {
        $this->locations = Location::selectRaw('*, ST_X(point::geometry) AS longitude, ST_Y(point::geometry) AS latitude')->get();
    }

    public function render()
    {
        $locations = Location::selectRaw('*, ST_X(point::geometry) AS longitude, ST_Y(point::geometry) AS latitude')->get();
        return view('livewire.table-component', ['locations' => $locations]);
    }
}

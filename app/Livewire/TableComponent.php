<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Location;
use Livewire\WithPagination;

class TableComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'oldest';

    public function applyFilter($sortBy)
    {
        $this->sortBy = $sortBy;
    }

    public function render()
    {
        $locations = Location::selectRaw('*, ST_X(point::geometry) AS longitude, ST_Y(point::geometry) AS latitude');

        $locations->where('device_id', 'ILIKE', '%' . $this->search . '%');

        if ($this->sortBy === 'latest') {
            $locations->latest();
        } else {
            $locations->oldest();
        }

        return view('livewire.table-component', ['locations' => $locations->paginate(7)]);
    }
}

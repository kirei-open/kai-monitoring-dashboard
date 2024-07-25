<?php

namespace App\Livewire\Pages\Table;

use App\Models\Location;
use Livewire\Component;

class Table extends Component
{
    public $search = '';
    public $sortBy = 'latest';
    public $selectedOption = '';
    public function applyFilter($sortBy)
    {
        $this->sortBy = $sortBy;
    }

    public function render()
    {
        $query = Location::search($this->search);

        if ($this->sortBy === 'latest') {
            $query->orderBy('created_at', 'desc');
        } else {
            $query->orderBy('created_at', 'asc');
        }
        
        $locations = $query->paginate(7);

        return view('livewire.pages.table.table', ['locations' => $locations]);
    }
}
<?php

namespace App\Livewire;

use App\Models\TableMonitoring;
use Livewire\Component;
use Livewire\WithPagination;

class TableComponent extends Component
{
    use WithPagination;
    
    public $monitoring;
    public $sortBy = 'latest';

    public function render()
    {
        return view('livewire.table-component');
    }

    public function mount()
    {
        $this->monitoring = TableMonitoring::all();
        $this->applyFilter();
    }

    public function applyFilter()
    {
        if ($this->sortBy == 'latest') {
            $this->monitoring = $this->monitoring->sortByDesc('created_at');
        } elseif ($this->sortBy == 'oldest') {
            $this->monitoring = $this->monitoring->sortBy('created_at');
        }
        $this->render();
    }
    
}

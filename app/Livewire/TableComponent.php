<?php

namespace App\Livewire;

use App\Models\TableMonitoring;
use Livewire\Component;
use Livewire\WithPagination;

class TableComponent extends Component
{
    use WithPagination;
    
    public $monitoring;

    public function render()
    {
        return view('livewire.table-component');
    }

    public function mount()
    {
        $this->monitoring = TableMonitoring::all();
    }
    
}

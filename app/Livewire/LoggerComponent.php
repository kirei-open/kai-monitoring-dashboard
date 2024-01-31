<?php

namespace App\Livewire;

use App\Models\EventLogger;
use Livewire\Component;

class LoggerComponent extends Component
{
    public $event_logger;
    public $sortBy = 'latest';
    
    public function render()
    {
        return view('livewire.logger-component');
    }

    public function mount()
    {
        $this->event_logger = EventLogger::all();
        $this->applyFilter();
    }

    public function applyFilter()
    {
        if ($this->sortBy == 'latest') {
            $this->event_logger = $this->event_logger->sortByDesc('created_at');
        } elseif ($this->sortBy == 'oldest') {
            $this->event_logger = $this->event_logger->sortBy('created_at');
        }
        $this->render();
    }
}

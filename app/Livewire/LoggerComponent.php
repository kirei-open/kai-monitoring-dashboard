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
}

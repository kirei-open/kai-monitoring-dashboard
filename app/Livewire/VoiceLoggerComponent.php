<?php

namespace App\Livewire;

use App\Models\VoiceLogger;
use Livewire\Component;

class VoiceLoggerComponent extends Component
{
    public $voice_logger;
    public $sortBy = 'latest';
    
    public function render()
    {
        return view('livewire.voice-logger-component');
    }
}

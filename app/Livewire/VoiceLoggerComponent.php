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

    public function mount()
    {
        $this->voice_logger = VoiceLogger::all();
        $this->applyFilter();
    }

    public function applyFilter()
    {
        if ($this->sortBy == 'latest') {
            $this->voice_logger = $this->voice_logger->sortByDesc('created_at');
        } elseif ($this->sortBy == 'oldest') {
            $this->voice_logger = $this->voice_logger->sortBy('created_at');
        }
        $this->render();
    }
}

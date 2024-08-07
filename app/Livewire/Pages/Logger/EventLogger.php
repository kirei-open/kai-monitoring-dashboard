<?php

namespace App\Livewire\Pages\Logger;

use App\Models\ActivityLog;
use Livewire\Component;

class EventLogger extends Component
{
    public function render()
    {
        $activityLogs = ActivityLog::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.pages.logger.event-logger', ['activity_logs' => $activityLogs]);
    }
}

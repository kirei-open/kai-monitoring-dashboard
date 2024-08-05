<?php

namespace App\Livewire\Actions;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout
{
    /**
     * Log the current user out of the application.
     */
    public function __invoke(): void
    {
        $user = Auth::user();

        if ($user->hasRole('super_admin')) {
            ActivityLog::create([
                'description' => 'Logged out',
            ]);
        }

        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();
    }
}

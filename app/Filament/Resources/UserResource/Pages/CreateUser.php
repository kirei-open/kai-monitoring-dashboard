<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use App\Models\ActivityLog;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function afterCreate()
    {
        ActivityLog::create([
            'description' => 'Added a user data'
        ]);
    }
}

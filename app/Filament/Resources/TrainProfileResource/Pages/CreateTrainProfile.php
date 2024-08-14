<?php

namespace App\Filament\Resources\TrainProfileResource\Pages;

use Filament\Actions;
use App\Models\ActivityLog;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\TrainProfileResource;

class CreateTrainProfile extends CreateRecord
{
    protected static string $resource = TrainProfileResource::class;

    protected function afterCreate()
    {
        ActivityLog::create([
            'description' => 'Added a train profile data'
        ]);
    }
}

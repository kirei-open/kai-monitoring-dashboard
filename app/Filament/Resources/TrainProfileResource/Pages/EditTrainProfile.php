<?php

namespace App\Filament\Resources\TrainProfileResource\Pages;

use Filament\Actions;
use App\Models\ActivityLog;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\TrainProfileResource;

class EditTrainProfile extends EditRecord
{
    protected static string $resource = TrainProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterUpdate()
    {
        ActivityLog::create([
            'description' => 'Updated a train profile data'
        ]);
    }
}

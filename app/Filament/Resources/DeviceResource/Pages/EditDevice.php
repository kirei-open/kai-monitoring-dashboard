<?php

namespace App\Filament\Resources\DeviceResource\Pages;

use Filament\Actions;
use App\Models\ActivityLog;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\DeviceResource;

class EditDevice extends EditRecord
{
    protected static string $resource = DeviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave()
    {
        ActivityLog::create([
            'description' => 'Updated a device data'
        ]);
    }
}

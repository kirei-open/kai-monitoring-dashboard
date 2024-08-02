<?php

namespace App\Filament\Resources\DeviceResource\Pages;

use Filament\Actions;
use App\Models\ActivityLog;
use App\Filament\Resources\DeviceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDevice extends CreateRecord
{
    protected static string $resource = DeviceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['api_key'] = bin2hex(random_bytes(20));

        return $data;
    }

    protected function afterCreate()
    {
        ActivityLog::create([
            'description' => 'Added a device data'
        ]);
    }
}

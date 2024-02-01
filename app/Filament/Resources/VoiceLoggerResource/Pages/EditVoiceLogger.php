<?php

namespace App\Filament\Resources\VoiceLoggerResource\Pages;

use App\Filament\Resources\VoiceLoggerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVoiceLogger extends EditRecord
{
    protected static string $resource = VoiceLoggerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

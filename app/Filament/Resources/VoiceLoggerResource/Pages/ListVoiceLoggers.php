<?php

namespace App\Filament\Resources\VoiceLoggerResource\Pages;

use App\Filament\Resources\VoiceLoggerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVoiceLoggers extends ListRecords
{
    protected static string $resource = VoiceLoggerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

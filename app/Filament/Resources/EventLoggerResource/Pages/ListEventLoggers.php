<?php

namespace App\Filament\Resources\EventLoggerResource\Pages;

use App\Filament\Resources\EventLoggerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventLoggers extends ListRecords
{
    protected static string $resource = EventLoggerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

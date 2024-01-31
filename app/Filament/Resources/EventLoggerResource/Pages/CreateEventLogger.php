<?php

namespace App\Filament\Resources\EventLoggerResource\Pages;

use App\Filament\Resources\EventLoggerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEventLogger extends CreateRecord
{
    protected static string $resource = EventLoggerResource::class;
}

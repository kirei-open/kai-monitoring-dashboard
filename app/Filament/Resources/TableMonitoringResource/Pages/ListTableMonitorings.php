<?php

namespace App\Filament\Resources\TableMonitoringResource\Pages;

use App\Filament\Resources\TableMonitoringResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTableMonitorings extends ListRecords
{
    protected static string $resource = TableMonitoringResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

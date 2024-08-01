<?php

namespace App\Filament\Resources\TrainProfileResource\Pages;

use App\Filament\Resources\TrainProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrainProfile extends EditRecord
{
    protected static string $resource = TrainProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

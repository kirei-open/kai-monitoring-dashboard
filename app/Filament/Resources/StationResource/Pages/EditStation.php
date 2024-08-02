<?php

namespace App\Filament\Resources\StationResource\Pages;

use Filament\Actions;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\StationResource;

class EditStation extends EditRecord
{
    protected static string $resource = StationResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['point'] = DB::raw("ST_GeomFromText('POINT({$data['longitude']} {$data['latitude']})')");

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave()
    {
        ActivityLog::create([
            'description' => 'Updated a station data'
        ]);
    }
}

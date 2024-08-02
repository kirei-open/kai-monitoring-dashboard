<?php

namespace App\Filament\Resources\StationResource\Pages;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\StationResource;

class CreateStation extends CreateRecord
{
    protected static string $resource = StationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['point'] = DB::raw("ST_GeomFromText('POINT({$data['longitude']} {$data['latitude']})')");

        return $data;
    }

    protected function afterCreate()
    {
        ActivityLog::create([
            'description' => 'Added a station data'
        ]);
    }
}

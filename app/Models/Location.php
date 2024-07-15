<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $primaryKey = 'device_id';

    protected $casts = [
        'device_id' => 'string',
    ];

    protected $fillable = [
        'device_id',
        'datetime',
        'point',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function scopeSearch($query, $value){
        return $query->where('device_id', 'like', "%{$value}%")
                     ->selectRaw('*, ST_X(point::geometry) AS longitude, ST_Y(point::geometry) AS latitude');
    }
}

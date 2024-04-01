<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_id',
        'datetime',
        'point',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}

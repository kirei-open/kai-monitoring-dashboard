<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $primaryKey = 'serial_number';

    protected $casts = [
        'serial_number' => 'string',
    ];

    protected $fillable = [
        'serial_number',
        'name',
        'code',
        'last_location',
        'last_monitored_value',
    ];

    protected static function booted()
    {
        static::creating(function ($device) {
            // Generate a random 40-character string for api_key
            $device->api_key = bin2hex(random_bytes(20));
        });
    }
}

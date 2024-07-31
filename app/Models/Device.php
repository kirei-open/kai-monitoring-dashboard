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
        'code',
        'last_location',
        'last_monitored_value',
        'api_key'
    ];
}

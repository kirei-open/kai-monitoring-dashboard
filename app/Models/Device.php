<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $primaryKey = 'serial_number';

    protected $fillable = [
        'serial_number',
        'name',
        'code',
        'last_location',
        'last_monitored_value',
    ];
}

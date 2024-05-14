<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;

    protected $primaryKey = 'device_id';

    protected $casts = [
        'device_id' => 'string',
    ];

    protected $fillable = [
        'device_id',
        'datetime',
        'key',
        "value",
        "unit"
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}

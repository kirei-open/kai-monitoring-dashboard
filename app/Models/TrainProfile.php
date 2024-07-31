<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function stations()
    {
        return $this->belongsTo(station::class);
    }
}

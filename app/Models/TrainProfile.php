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
        'device_id',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class); // Ensure this is correct
    }

    public function stations()
    {
        return $this->belongsToMany(Station::class, 'station_train_profile');
    }
}

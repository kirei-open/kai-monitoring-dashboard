<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'altitude',
        'point',
    ];

    public function trainProfiles()
    {
        return $this->belongsToMany(TrainProfile::class, 'station_train_profile');
    }
}

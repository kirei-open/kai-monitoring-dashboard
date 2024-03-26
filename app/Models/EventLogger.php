<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventLogger extends Model
{
    use HasFactory;
    protected $fillable = ['id_ralok','section','event','status','area'];
}

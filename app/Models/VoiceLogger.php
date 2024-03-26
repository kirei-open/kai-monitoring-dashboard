<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoiceLogger extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_ralok','section','voice_logger'];
}

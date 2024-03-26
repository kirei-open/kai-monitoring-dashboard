<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableMonitoring extends Model
{
    use HasFactory;
    protected $fillable = ['id_ralok','latitude','longitude','section','input_voltage','output_voltage','voltage','clasification','power_transmite','SWR'];
}

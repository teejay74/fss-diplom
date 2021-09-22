<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieShow extends Model
{
    use HasFactory;

    protected $fillable = [
        'hall_id',
        'movie_id',
        'movie_show_duration',
        'movie_name',
        'start_day',
        'start_time'
    ];

    protected $table = 'movie_show';
}

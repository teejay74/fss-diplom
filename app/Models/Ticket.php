<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'show_id',
        'start_time',
        'seats',
        'hall_name',
        'start_day',
        'price',
        'movie'
    ];
    protected $table = 'tickets';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'show_id',
        'start_time',
        'row',
        'seat'
    ];
    protected $table = 'orders';
}

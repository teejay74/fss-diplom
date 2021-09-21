<?php

namespace App\Http\Controllers;


use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index(Request $request)
    {
        return Seat::all()->where('hall_id', $request->id);

    }
}

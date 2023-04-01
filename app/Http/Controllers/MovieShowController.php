<?php

namespace App\Http\Controllers;


use App\Models\MovieShow;
use App\Models\Seat;
use Illuminate\Http\Request;

class MovieShowController extends Controller

{

    public function index() {
        return MovieShow::all();
    }


    public function saveSessions (Request $request) {

        $arrSessions = $request->all();
        $today = date("d.m.Y");
        foreach ($arrSessions as $value) {
            $overlayTime = MovieShow::where('hall_id', $value['hall_id'])->where('start_time', $value['start_time'])->first();
            $movieShow = new MovieShow();
            $movieShow->hall_id = $value['hall_id'];
            $movieShow->movie_id = $value['movie_id'];
            $movieShow->movie_show_duration = $value['movie_show_duration'];
            $movieShow->movie_name = $value['movie_name'];
            $movieShow->movie_description = $value['movie_description'];
            $movieShow->movie_poster = $value['movie_poster'];
            $movieShow->start_day = $today;
            $movieShow->start_time = $value['start_time'];
            if(!$overlayTime) {
                $movieShow->save();
            }
        }
        return  MovieShow::all();

    }

    public function showMoviesToday (Request $request) {

         return MovieShow::where('start_day', $request->curDate)->get();

    }
}

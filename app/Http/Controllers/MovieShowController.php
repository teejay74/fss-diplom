<?php

namespace App\Http\Controllers;


use App\Models\MovieShow;
use Illuminate\Http\Request;

class MovieShowController extends Controller

{

    public function index() {
        return MovieShow::all();
    }


    public function saveSessions (Request $request) {

        $arrSessions = $request->all();

        foreach ($arrSessions as $value) {

            $movieShow = new MovieShow();
            $movieShow->hall_id = $value['hall_id'];
            $movieShow->movie_id = $value['movie_id'];
            $movieShow->movie_show_duration = $value['movie_show_duration'];
            $movieShow->movie_name = $value['movie_name'];
            $movieShow->start_day = '22.09.2021';
            $movieShow->start_time = $value['start_time'];

            $movieShow->save();

        }

        return  MovieShow::all();

    }
}

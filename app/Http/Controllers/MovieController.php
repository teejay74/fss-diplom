<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post;
use App\Models\Film;
use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Validation\ValidationException;
use Log;

class MovieController extends Controller
{

    public function index()
    {
        return Movie::all();
    }

    public function store(Request $request) {
            if($request->poster) {
                $image = $request->file('poster');
                $imageName = time().'.'.$image->extension();
                $image->move(public_path('images'),$imageName);
                $path = 'images/'.$imageName;
            } else {
                $path = '';
            }

        try {
            $this->validate($request, [
                'title' => 'required|between:6,25'
            ]);
            $movie = new Movie();
            $movie->name = $request->title;
            $movie->description = $request->description;
            $movie->country =  $request->duration;
            $movie->duration =  $request->duration;
            $movie->poster = $path;
            $movie->save();
        } catch (ValidationException $e) {
        }

        return Movie::all();
    }
}

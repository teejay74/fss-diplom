<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiTestController extends Controller
{
    public function test() {
        $array = [
            'name' => 'Artem',
            'nickname' => 'Teejay'
        ];

        return response()->json($array);

    }
}

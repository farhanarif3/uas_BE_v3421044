<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Agama44;


class Halo44Controller extends Controller
{
    public function halo44()
    {
        $user = User::where('role', 'user')->get();
        $agama = Agama44::all();

        return view('welcome', ['data' => $user, 'agama' => $agama]);
    }


}

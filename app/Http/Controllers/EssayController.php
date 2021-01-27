<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Essay;
use App\http\Requests;

class EssayController extends Controller
{
    public function getIndex()
    {
        $essays = Essay::all();
        return view('main.index', ['essays' => $essays]);
    }
}

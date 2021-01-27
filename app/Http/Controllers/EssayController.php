<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EssayController extends Controller
{
    public function getIndex()
    {
        return view('main.index');
    }
}

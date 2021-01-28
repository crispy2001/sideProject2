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

    public function getEssayModal(Request $request, $id)
    {
        $essayModal = Essay::find($id);
        return view('main.index', $essayModal);
    }

    public function postAddEssay(Request $request){
        $essay = new Essay([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        $essay->save();
        return redirect()->route('main.index');
        
    }
}

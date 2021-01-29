<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Essay;
use App\User;
use App\http\Requests;
use Auth;
use DB;

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
        $this->validate($request, [
            'title' => 'required|min:1',
            'content' => 'required|min:1',
        ]);
        $essay = new Essay([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'editor' => Auth::user()->email
        ]);
        $essay->save();
        return redirect()->route('user.essay');
        
    }

    public function deleteEssay(Request $request, $id){
        $essay = Essay::find($id);
        $editor = User::where('email', '=', $essay->editor);
        if($editor->email = $essay->editor){
            echo "helloworld";
            $essay->delete();
        }
        
        return redirect()->route('main.index');
    }

    public function getManageEssay(){
        // $essays = Essay::all();
        $essays = DB::table('essays')->where('editor', '=', Auth::user()->email)->orderBy('id', 'desc')->get();
        return view('essays.manageEssays', ['essays' => $essays]);
    }

}

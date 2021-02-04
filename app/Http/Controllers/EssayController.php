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
        return view('main.index', ['essays' => $essays, 'cnt' => 0]);
    }

    public function getEssayModal(Request $request, $id)
    {
        $essayModal = Essay::find($id);
        return view('main.index', $essayModal);
    }

    public function postAddEssay(Request $request)
    {
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

    public function deleteEssay(Request $request, $id)
    {
        $essay = Essay::find($id);

        $essay->delete();

        return redirect()->route('user.essay');
    }

    public function getManageEssay()
    {
        // $essays = Essay::all();
        // if(Auth::user()->isAdmin == '0')
        //     $essays = DB::table('essays')->where('editor', '=', Auth::user()->email)->orderBy('id', 'desc')->get();
        // else
        //     $essays = Essay::all();
        $essays = Essay::all();
        $myEssays = DB::table('essays')->where('editor', '=', Auth::user()->email)->get();
        return view('essays.manageEssays', ['essays' => $essays, 'myEssays' => $myEssays]);
    }

    public function getEditEssay($id)
    {
        $essay = Essay::find($id);
        return view('essays.editEssays', ['essay' => $essay]);
        // $essay = DB::table('essays')->where('id', '=', $id)->get();
        // return view('essays.editEssays', ['essay' => $essay]);
    }
    public function patchEditEssay(Request $request, $id)
    {
        $essay = DB::table('essays')->where('id', '=', $id)->get();
        $essay = DB::table('essays')->where('id', '=', $id)->update([
            "title" => $request->title,
            "content" => $request->content
        ]);

        return redirect()->route('user.essay');
    }
}

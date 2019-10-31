<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recruit;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\reqs;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $posts = Recruit::latest('updated_at')->paginate(10);

        return view('recruit.index', array('posts' => $posts));
    }


    public function mypage(Request $request)
    {
        $user = Auth::user();

        $posts=Recruit::latest('updated_at')->where('user_id',  $user->id)->get();

        return view('admin/recruit/mypage', array('posts' => $posts));
    }


    //全体ページからの詳細確認（誰でも閲覧可）
    public function detail(Request $request)
    {
        $posts = Recruit::find($request->id);


        return view('recruit.detail',['posts' => $posts]);
    }


   //マイページから飛べる詳細
    public function mydetail(Request $request)
    {

        $user = Auth::user();
        $posts = Recruit::find($request->id);

        $approval = reqs::where('recruiter_id', $user->id)->where('recruit_id', $posts->id)->first();

        if ($user->id !== intval($posts->user_id)) {
            if ($approval == null) {
                return redirect('/home');
            } elseif ($approval->approval == 0) {
                return redirect('/home');
            }
        }


        if(empty($posts)){
            return redirect('/')->with('flash_message','ページがありません');
        }

        $comments=Comment::where('recruit_id', $request->id)->get();

        return view('admin.recruit.detail', ['user' => $user,'posts' => $posts,'comments' => $comments]);

    }

    public function topIndex(Request $request)
    {

        return view('recruit.home');
    }

    public function about(Request $request)
    {
        return view('recruit.about');
    }

    public function info(Request $request)
    {
        return view('recruit.info');
    }

}



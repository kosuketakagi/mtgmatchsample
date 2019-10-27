<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recruit;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use App\Comment;


class IndexController extends Controller
{
    public function index(Request $request)
    {

//        Recruit::with('users:name,twitter_id')->get();
        $posts = Recruit::paginate(2);

        //dd($posts->user()->name);
        return view('recruit.index', array('posts' => $posts));
    }


    public function mypage(Request $request)
    {
        $user = Auth::user();

        $posts=Recruit::where('user_id',  $user->id)->get();

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
        $posts = Recruit::find($request->id);

        if(empty($posts)){
            return redirect('/')->with('flash_message','ページがありません');
        }


        $comments=Comment::where('recruit_id', $request->id)->get();

        return view('admin.recruit.detail', ['posts' => $posts],array('comments' => $comments));

    }

    public function topIndex(Request $request)
    {

        return view('recruit.home');
    }

    public function about(Request $request)
    {
        return view('recruit.about');
    }


}



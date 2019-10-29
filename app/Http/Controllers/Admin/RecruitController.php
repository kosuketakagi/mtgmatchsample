<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recruit;
use App\reqs;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Validation;
use App\Comment;
use function Couchbase\defaultDecoder;
use Illuminate\Validation\Rule;


class RecruitController extends Controller
{
    public function add() {
        $user = Auth::user();
        return view('admin/recruit/create', ['user' => $user]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Recruit::$rules);

        $recruit = new Recruit;
        $form = $request->all();

        $recruit->fill($form);
        $recruit->save();

        return redirect('admin/recruit/create');
    }

    public function edit(Request $request)
    {
        $post = Recruit::find($request->id);

        return view('admin/recruit/edit', ['post' => $post]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Recruit::$rules);

        $recruit = Recruit::find($request->id);

        $recruits_form = $request->all();

        //dd($recruits_form);
        $recruit->fill($recruits_form);
        unset($recruits_form['_token']);

        $recruit->save();
       // dd($recruit);
        return redirect('admin/recruit/mypage');
    }


    public function join(Request $request ) {
        $request_user = new reqs;

        $request_user->recruit_id = $request->id;

        $user = Auth::user();

        $request_user->recruiter_id = $user->id;

        \Validator::validate($request_user->toArray(),
            ['recruit_id' => [
                'required',
                Rule::unique('reqs')->where(function ($query) use ($request_user){
                    return $query->where('recruit_id', $request_user->recruit_id)
                        ->where('recruiter_id', $request_user->recruiter_id);
                })
            ]]);

        $request_user->save();

        return view('admin/recruit/join');
    }


    public function delete(Request $request)
    {

        $recruit = Recruit::find($request->id);

        $recruit->delete();

        return redirect('admin/recruit/mypage');


    }

    public function deleteComment(Request $request)
    {

        $comment = Comment::find($request->id);

        $comment->delete();

        return redirect('admin/recruit/mypage');

    }



    public function comment(Request $request)
    {
        $user = Auth::user();
        \Validator::validate($request->toArray(),['body' => 'required',]);

        $comment = new Comment;
        $user = Auth::user();
        $comment->user_id = $user->id;
        $form = $request->all();

        $comment->fill($form);
       // dd($comment);
        $comment->save();

        $comments=Comment::  where('recruit_id', $comment->recruit_id)->get();
        $posts = Recruit::find($comment->recruit_id);

        return view('admin.recruit.detail', ['user' => $user,'posts' => $posts,'comments' => $comments]);
    }


    public function approval(Request $request)
    {
        $req = reqs ::find($request->id);
        $req->approval = 1;
        $req->save();

        return redirect('admin/recruit/request');
    }

    public function notApproval(Request $request)
    {
        $req = reqs ::find($request->id);
        $req->approval = 0;
        $req->save();

        return redirect('admin/recruit/request');
    }


    public function requestIndex(Request $request)
    {
        $user = Auth::user();

        $send_reqs =  reqs::where('recruiter_id',$user->id)->get();


        $recruits = Recruit::where('user_id',$user->id)->get();


        return view('admin.recruit.request',['send_reqs' => $send_reqs, 'recruits' => $recruits]);
    }
}

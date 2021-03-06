<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recruit;
use App\reqs;
use App\Tag;
use App\Recruit_tag;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Validation;
use App\Comment;
use function Couchbase\defaultDecoder;
use Illuminate\Validation\Rule;


class RecruitController extends Controller
{
    public function add() {
        $user = Auth::user();
        $tag = new Tag;
        $tags = $tag->get();
        return view('admin/recruit/create', ['user' => $user,'tags' => $tags]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Recruit::$rules);
        $recruit = new Recruit;

        $form = $request->all();

        unset($form['format']);
        $recruit->fill($form);
        $recruit->save();


        $recruit->tags()->attach($request->format);

        return view('admin/recruit/tweet',['recruit' => $recruit]);

    }

    public function tweet(Request $request)
    {

        return view('admin/recruit/tweet');

   }

    public function edit(Request $request)
    {
        $post = Recruit::find($request->id);
        $tag = new Tag;
        $tags = $tag->get();

        return view('admin/recruit/edit', ['post' => $post,'tags' => $tags]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Recruit::$rules);

        $recruit = Recruit::find($request->id);

        $recruits_form = $request->all();
        unset($recruits_form['format']);

        $recruit->fill($recruits_form);
        unset($recruits_form['_token']);
        $recruit->save();

        Recruit_tag::where('recruit_id',$request->id)->get()->each->delete();

        $recruit->tags()->attach($request->format);

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

        $send_reqs =  reqs::latest('updated_at')->where('recruiter_id',$user->id)->get();


        $recruits = Recruit::latest('created_at')->where('user_id',$user->id)->get();


        return view('admin.recruit.request',['send_reqs' => $send_reqs, 'recruits' => $recruits]);
    }
}

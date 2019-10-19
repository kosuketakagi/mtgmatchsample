<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recruit;
use App\Req;
use Illuminate\Support\Facades\Auth;

class RecruitController extends Controller
{
    public function add() {
        $user = Auth::user();
        return view('admin/recruit/create', ['user' => $user]);
    }

    // 以下を追記
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
        $posts = Recruit::find($request->id);

        return view('admin/recruit/edit', ['recruits_form' => $posts]);
    }


    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Recruit::$rules);

        // News Modelからデータを取得する
        $posts = Recruit::find($request->id);

        // 送信されてきたフォームデータを格納する
        $recruits_form = $request->all();

        unset($recruits_form['_token']);

        // 該当するデータを上書きして保存する
        $posts->fill($recruits_form)->save();

        return redirect('admin/recruit/edit');
    }

    public function join(Request $request) {
        $request_user = new Req;

        $posts = Recruit::find($request->id);

        $request_user->recruit_id= $posts->id;

        $user = Auth::user();

        $request_user->name = $user->name;
        $request_user->twitter_id= $user->twitter_id;

        $request_user->save();

        return view('admin/recruit/join');
    }




}

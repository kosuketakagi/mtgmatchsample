@extends('layouts.admin')
@section('title', 'リクエスト一覧')
@section('content')
<div class="container">
<br>
    <h2>送信リクエスト一覧</h2>
    <p>承認されると、詳細よりやりとりが出来ます。</p>

    @foreach($send_reqs as $req)

        <div class="mypage">
            @if ($req->approval==0)
                <a href="{{ action('IndexController@detail', ['id' => $req->recruit_id]) }}"> {{ str_limit($req->recruit->title, 24) }}</a>
                <strong>リクエスト中</strong>
            @elseif ($req->approval==1)
                <a href="{{ action('IndexController@mydetail', ['id' => $req->recruit_id]) }}"> {{ str_limit($req->recruit->title, 24) }}</a>
                <strong>承認済み</strong>
            @endif
        </div>

    @endforeach

    <hr color="#c0c0c0">
    <br>

    <h2>受信リクエスト一覧</h2>
    @foreach($recruits as $recruit)
        @foreach($recruit->reqs as $req)
            <div class="mypage">

                from<strong><a href="https://twitter.com/{{($req->user->twitter_id)}}">{{($req->user->name) }}</a></strong>

                //<a href="{{ action('IndexController@mydetail', ['id' => $req->recruit_id]) }}">募集詳細</a>//


            @if ($req->approval==0)
                            <form action="{{ action('Admin\RecruitController@approval') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $req->id }}">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="承認する">
                            </form>

            @elseif ($req->approval==1)
                    <strong>承認済み</strong>

                            <form action="{{ action('Admin\RecruitController@notApproval') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $req->id }}">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-danger" value="非承認に戻す">
                            </form>

            @endif
            </div>
                @endforeach
    @endforeach

@endsection

@extends('layouts.admin')
@section('title', 'リクエスト一覧')
@section('content')
<div class="container">
<br>
    <h2>送信リクエスト一覧</h2>
    <p>承認されると、詳細よりやりとりが出来ます。</p>

    @foreach($send_reqs as $req)

            @if ($req->approval==0)
            <div class="box11">
            <div class="index-title">
                <a href="{{ action('IndexController@detail', ['id' => $req->recruit_id]) }}"> {{ str_limit($req->recruit->title, 30) }}</a>

                <span class="index-time">
                        {{ $req->created_at->format('Y.m.d') }}
                </span>

            </div>
               ステータス <strong style="color: red;">『リクエスト中』</strong>
            </div>


            @elseif ($req->approval==1)
            <div class="box11">
                <div class="index-title">
                        <a href="{{ action('IndexController@mydetail', ['id' => $req->recruit_id]) }}">
               {{ str_limit($req->recruit->title, 24) }}</a>
                    <span class="index-time">
                        {{ $req->created_at->format('Y.m.d') }}
                </span>

                </div>
                <strong>承認済み</strong>
                </div>


            @endif


    @endforeach

    <hr color="#c0c0c0">
    <br>

    <h2>受信リクエスト一覧</h2>
    @foreach($recruits as $recruit)
        @foreach($recruit->reqs as $req)
            <div class="box11">
                <div class="index-title">
                from//<strong><a href="https://twitter.com/{{($req->user->twitter_id)}}">{{($req->user->name) }}</a></strong>

                    <span class="index-time">
                        {{ $req->created_at->format('Y.m.d') }}
                    </span>
                </div>



            @if ($req->approval==0)
                            <form action="{{ action('Admin\RecruitController@approval') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $req->id }}">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" style="margin: 2px;" value="承認する"> //<a href="{{ action('IndexController@mydetail', ['id' => $req->recruit_id]) }}">募集詳細</a>//
                            </form>


            @elseif ($req->approval==1)
                            <form action="{{ action('Admin\RecruitController@notApproval') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $req->id }}">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-danger" style="margin: 2px;" value="非承認に戻す"> //<a href="{{ action('IndexController@mydetail', ['id' => $req->recruit_id]) }}">募集詳細</a>//
                            </form>

            @endif


            </div>
                @endforeach
    @endforeach

@endsection

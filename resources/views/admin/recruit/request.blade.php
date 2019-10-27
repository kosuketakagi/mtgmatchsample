@extends('layouts.admin')
@section('title', 'リクエスト一覧')
@section('content')
<div class="container">

    <h2>送ったリクエスト一覧</h2>
    @foreach($send_reqs as $req)

        <div class="text col-md-6">
            <div class="body mt-3">
                {{ str_limit($req->recruit_id, 1500) }}
            </div>

            @if ($req->approval==0)
               <div>リクエスト中</div>
            @elseif ($req->approval==1)
                <div>承認済み</div>
                <a href="{{ action('IndexController@mydetail', ['id' => $req->id]) }}">詳細</a>
            @endif

        </div>
        <hr color="#c0c0c0">
    @endforeach



    <h2>受け取ったリクエスト一覧</h2>
    @foreach($recruits as $recruit)
        @foreach($recruit->reqs as $req)

        <div class="text col-md-6">
            <div class="body mt-3">
                {{ str_limit($req->recruit_id, 1500) }}
            </div>

            <div class="body mt-3">
                {{ str_limit($req->user->name, 1500) }}
            </div>

            <div class="body mt-3">
                {{ str_limit($req->user->twitter_id, 1500) }}
            </div>

                <div>
            @if ($req->approval==0)
                        <div class="col-md-4">
                            <form action="{{ action('Admin\RecruitController@approval') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $req->id }}">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="承認する">
                                <form>
                        </div>

            @elseif ($req->approval==1)
                <div>承認済み</div>
            @endif
                <div>

        </div>
                @endforeach
        <hr color="#c0c0c0">
    @endforeach


@endsection

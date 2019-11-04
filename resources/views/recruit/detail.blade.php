@extends('layouts.admin')
@section('title', '募集詳細')

@section('content')

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="box11">
                    <div class="index-title">
                        {{ $posts->title }}　
                        <span class="index-time">
                        投稿日時{{ $posts->created_at->format('Y.m.d') }}
                            </span>
                    </div>
                    <ul class="index-ul">
                        <li> twitter-name<b class="index-strong"><a href="https://twitter.com/{{($posts->user->twitter_id)}}">{{$posts->user->name }}</a></b></li>
                        <li>遊びやすい日<b class="index-strong">{{$posts->time}}</b> </li>
                        <li>
                            対戦希望フォーマット<b class="index-strong">{{ $posts->format}}</b>
                        </li>

                        <li>ショップ名<b class="index-strong">{{ $posts->shop}}</b>// {{ $posts->pref_id }} </li>
                    </ul>

                    <div class="body mt-3">
                        {{ $posts->body}}
                    </div>
                </div>

            <div class="detail-bottun">
                <a href="{{ action('Admin\RecruitController@join' ,['id'=> $posts->id]) }}" class="btn-gradient-3d-simple">リクエストを送る！！</a>
            </div>
<p>リクエストが承認されると、この方とやりとりが出来ます！！</p>
                <p>リクエスト状況はサイドバーの『リクエスト一覧』より確認できます。</p>
@endsection

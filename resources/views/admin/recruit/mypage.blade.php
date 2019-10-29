@extends('layouts.admin')
@section('title', '自分の投稿一覧')

@section('content')
<div class="container">
    <br>
<p>こちらよりリクエスト承認済みの方とやりとりができます。</p>

            @foreach($posts as $recruit)
            <div class="mypage">
                <a href="{{ action('IndexController@mydetail', ['id' => $recruit->id]) }}"> {{ str_limit($recruit->title, 24) }}</a>

                            <span class="index-time">
                        投稿日時{{ $recruit->created_at->format('Y.m.d') }}
                            </span>
                            <a href="{{ action('Admin\RecruitController@edit', ['id' => $recruit->id])}}" class="btn-square-little-rich">編集</a>
            </div>
            @endforeach


{{--{{$posts->links()}}--}}
@endsection

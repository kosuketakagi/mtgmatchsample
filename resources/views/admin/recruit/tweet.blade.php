@extends('layouts.admin')
@section('title', 'ツイートしよう！！')

@section('content')
    <div style=" text-align: center;">
    <br>
     <h2 class="top-mess">投稿完了しました。</h2>
        <br>
     <h2 class="top-mess">募集をツイートしよう！！</h2>

    <a  class="tweet-button" href="https://twitter.com/intent/tweet?text=『 {{ $recruit->title}}』MTG Matchにて募集中！！&url=https://mtgmatch.sugarlessmtg.com/detail?id={{ $recruit->id}}&via=MatchMtg" target=”_blank”>Tweet</a>
    <br>
    <br>
  <a href="/admin/recruit/mypage">My募集ページへ</a>

    </div>
@endsection

@extends('layouts.admin')
@section('title', 'MTG Match')


@section('content')
<div class="top-image"><img src="{{ asset('images/ddg-29-heroes-reunion.jpg')}}" class="top-image"></div>

<div class="top-comments">
    <div>
    <h2 class="top-match">『MTG Match』とは</h2>
<p><strong>Magic:The Gatheringの対戦相手を探すことが出来るツールです。</strong></p>

    <ul>
        <li>アリーナで始めてみたけど、紙で遊べる友達がいない。</li>
        <li>初心者でいきなり大会に出るのは躊躇している。</li>
        <li>フリープレイを楽しみたい。</li>
    </ul>

    <p>こんな方々のお役に立てれば幸いです。</p>

    <h2 class="top-mess">マジックをもっと身近に楽しもう！</h2>
</div>

</div>

<div class="top-button">
    <button type="button" class="raised-button" onclick="location.href='./index'">探してみる！</button>
    <button type="button" class="raised-button" onclick="location.href='./admin/recruit/create'">募集してみる！</button>
</div>


@endsection

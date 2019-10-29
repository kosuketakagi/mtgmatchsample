@extends('layouts.admin')
@section('title', '募集一覧')


@section('content')
<div class="container">
    <hr color="#c0c0c0">

            @foreach($posts as $recruit)
                <div class="box11">
                        <div class="index-title">
                         {{ str_limit($recruit->title, 30) }}

                            <span class="index-time">
                        投稿日時{{ $recruit->created_at->format('Y.m.d') }}
                            </span>

                        </div>

                       <ul class="index-ul">
                           <li> twitter-name<b class="index-strong"> {{$recruit->user->name }}</b></li>
                           <li>遊びやすい日<b class="index-strong">{{$recruit->time}}</b> </li>
                           <li>
                            対戦希望フォーマット<b class="index-strong">{{ str_limit($recruit->format, 20) }}</b>
                            </li>

                           <li>ショップ名<b class="index-strong">{{ str_limit($recruit->shop, 20) }}</b>// {{ str_limit($recruit->pref_id, 10) }} </li>

                       </ul>

                        <div class="body mt-3">
                            {{ str_limit($recruit->body, 200) }}
                        </div>

                        <div class="index-button">
                            <a href="{{ action('IndexController@detail', ['id' => $recruit->id]) }}" class="index-button">詳細</a>
                        </div>

                </div>
            @endforeach



</div>

<div class="pagenation" >{{$posts->links()}}</div>

@endsection

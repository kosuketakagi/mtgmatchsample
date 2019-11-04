@extends('layouts.admin')
@section('title', '募集一覧')


@section('content')
<div class="container">
    <hr color="#c0c0c0">

            @foreach($posts as $recruit)
                <div class="box11">
                        <div class="index-title">
                         {{ $recruit->title }}
                            <span class="index-time">
                        投稿日時{{ $recruit->updated_at->format('Y.m.d') }}
                            </span>

                        </div>

                       <ul class="index-ul">
                           <li> twitter-name<b class="index-strong"> {{$recruit->user->name }}</b></li>
                           <li>遊びやすい日<b class="index-strong">{{$recruit->time}}</b> </li>
                           <li>
                            対戦希望フォーマット<b class="index-strong">{{$recruit->format}}</b>
                            </li>

                           <li>ショップ名<b class="index-strong">{{ $recruit->shop }}</b>// {{ $recruit->pref_id}} </li>

                       </ul>

                        <div class="body mt-3">
                            {{$recruit->body}}
                        </div>

                        <div>
                            <a href="{{ action('IndexController@detail', ['id' => $recruit->id]) }}" class="index-button">詳細</a>
                           <strong class="index-approval-count">{{count($recruit->reqs_approval)}}人参加中！！</strong>
                        </div>

                </div>
            @endforeach



</div>

<div class="pagenation" >{{$posts->links()}}</div>

@endsection

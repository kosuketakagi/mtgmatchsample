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
                        投稿日時{{ $recruit->updated_at->format('Y.m.d') }}
                            </span>

                        </div>

                       <ul class="index-ul">
                           <li><img src="{{$recruit->user->avatar}}" class="twitter-avatar">&nbsp; <b class="index-strong">{{$recruit->user->name}}</b>&nbsp;さんより</li>
                           <li>遊びやすい日<b class="index-strong">{{$recruit->time}}</b> </li>
                           <li>フォーマット
                             <b class="index-strong">
                                   {{ $recruit->format}}
                                   @foreach($recruit->tags as $format)
                                       {{ $format->name}},
                                   @endforeach
                               </b>
                            </li>

                           <li>ショップ名<b class="index-strong">{{ str_limit($recruit->shop, 20) }}</b>// {{$recruit->pref_id}} </li>

                       </ul>

                        <div class="body mt-3">
                            {{ str_limit($recruit->body, 200) }}
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

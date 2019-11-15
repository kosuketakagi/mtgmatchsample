@extends('layouts.admin')
@section('title', '投稿詳細')

@section('content')

    <div class="container">

{{--        リクエスト詳細--}}
            <div class="box11" class="comments-req">
                <div class="index-title">
                    {{ str_limit($posts->title, 30) }}
                    <span class="index-time">
                        投稿日時{{ $posts->created_at->format('Y.m.d') }}
                            </span>
                </div>
                <ul class="index-ul">
                    <li><img src="{{$posts->user->avatar}}" class="twitter-avatar">&nbsp; <b class="index-strong"><a href="https://twitter.com/{{($posts->user->twitter_id)}}">{{$posts->user->name }}</a></b>&nbsp;さんより</li>
                    <li>遊びやすい日<b class="index-strong">{{$posts->time}}</b> </li>
                    <li>フォーマット
                        <b class="index-strong">
                            {{ $posts->format}}
                            @foreach($posts->tags as $format)
                                {{ $format->name}},
                            @endforeach
                        </b>
                    </li>

                    <li>ショップ名<b class="index-strong">{{ $posts->shop}}</b>// {{ str_limit($posts->pref_id, 10) }} </li>
                </ul>

                <div class="body mt-3">
                   {!! nl2br($posts->body) !!}
                </div>
            </div>


                @foreach($comments as $comment)

                    <div class="text col-md-6">
                        <div class="body mt-3" class="">
                        <strong><a href="https://twitter.com/{{($comment->user->twitter_id)}}">{{($comment->user->name) }}</a></strong>
                        </div>

                        <div class="body mt-3">
                            {{ str_limit($comment->body, 1000) }}
                        </div>
                    </div>


                    @if($user->id == $comment->user_id || $user->id == $posts->user_id)
                    <div class="col-md-4">
                        <form action="{{ action('Admin\RecruitController@deleteComment') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{ $comment->id }}">
                            {{ csrf_field() }}
                            <br>
                            <input type="submit" class="btn-danger"  value="削除">
                            </form>
                    </div>
                    @endif
                    <hr color="#c0c0c0">
                @endforeach

                <form action="{{ action('Admin\RecruitController@comment') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif

                        <div hidden>
                            <input type="text" class="form-control" name="recruit_id" value= "{{ $posts->id }}">

                        </div>

                    <div class="form-group row">
                        <label class="col-md-2" for="body">コメントする</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="5">{{ old('body') }}</textarea>
                        </div>
                    </div>

                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">
                            コメントする
                        </button>
                </form>
    </div>


@endsection

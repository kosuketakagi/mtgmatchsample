@extends('layouts.admin')
@section('title', 'anata')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>募集詳細</h1>
                <div class="title">
                    {{$posts->title }}
                </div>
                <div class="title">
                    {{$posts->time }}
                </div>
                <div class="title">
                    {{$posts->format }}
                </div>
                <div class="title">
                    {{$posts->shop }}
                </div>
                <div class="title">
                    {{$posts->pref_id }}
                </div>
                <div class="title">
                    {{$posts->body }}
                </div>


                @foreach($comments as $comment)

                    <div class="text col-md-6">
                        <div class="body mt-3">
                            {{ str_limit($comment->user_id, 1500) }}
                        </div>
                        <div class="body mt-3">
                            {{ str_limit($comment->body, 1500) }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <form action="{{ action('Admin\RecruitController@deleteComment') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{ $comment->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="削除">
                            <form>
                    </div>

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
                        <label class="col-md-2" for="body">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>


                        {{ csrf_field() }}


                        <button type="submit" class="btn btn-primary">
                            コメントする
                        </button>

                </form>




@endsection

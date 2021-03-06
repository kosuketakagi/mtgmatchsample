@extends('layouts.admin')
@section('title', '投稿の編集')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <br>
                <h2>投稿編集</h2>


             <form action="{{ action('Admin\RecruitController@update') }}" method="post" enctype="multipart/form-data">


                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif

                        <div class="form-group row">
                            <label class="col-md-2" for="title">タイトル</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2" for="time">遊びやすい日(平日or週末)</label>
                            <div class="col-md-10">
                                <select class="form-control" name="time" value="{{$post->time}}">
                                    <option value="平日">平日</option>
                                    <option value="平日">平日の夜</option>
                                    <option value="週末">週末</option>
                                    <option value="いつでもオッケー">いつでもオッケー</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2" for="format">フォーマット</label>
                            <div class="col-md-10">
                                @foreach ($tags as $tag)
                                    <input type="checkbox" name="format[]" value="{{ $tag->id }}">{{ $tag->name }}<br>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2" for="shop">ショップ名</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="shop" value="{{ $post->shop }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2" for="pref_id">都道府県</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="pref_id" value="{{ $post->pref_id}}">
                            </div>
                        </div>


                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="8">{{ $post->body }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <input type="hidden" name="user_id" value="{{ $post->user_id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <form action="{{ action('Admin\RecruitController@delete') }}" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="{{ $post->id }}" >
            {{ csrf_field() }}

            <input type="submit" class="btn-danger" value="削除" onClick="delete_alert(event);return false;">

       <form>

    </div>

@endsection

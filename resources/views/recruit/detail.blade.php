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
<br>

                <a href="{{ action('Admin\RecruitController@join' ,['id'=> $posts->id]) }}">参加リクエスト！！</a>


@endsection

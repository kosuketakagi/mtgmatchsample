@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="col-md-4">
        <a href="{{ action('Admin\RecruitController@add') }}" role="button" class="btn btn-primary">新規作成</a>
    </div>

    <hr color="#c0c0c0">

    <hr color="#c0c0c0">
    <div class="row">
        <div class="posts col-md-8 mx-auto mt-3">
            <a helf="https://blog.hiroyuki90.com/articles/laravel-bbs/">
            @foreach($posts as $recruit)
            <div class="post　>
                <div class="row">
                    <div class="text col-md-6">

                        <div class="title">
                            {{ str_limit($recruit->name, 150) }}
                        </div>

                        <div class="title">
                            {{ str_limit($recruit->twitter_id, 150) }}
                        </div>

                        <div class="title">
                            {{ str_limit($recruit->title, 150) }}
                        </div>
                        <div class="title">
                            {{ str_limit($recruit->time, 150) }}
                        </div>
                        <div class="title">
                            {{ str_limit($recruit->format, 150) }}
                        </div>
                        <div class="title">
                            {{ str_limit($recruit->shop, 150) }}
                        </div>
                        <div class="title">
                            {{ str_limit($recruit->pref_id, 150) }}
                        </div>
                        <div class="body mt-3">
                            {{ str_limit($recruit->body, 1500) }}
                        </div>

                        <div>
                            <a href="{{ action('AllviewController@detail', ['id' => $recruit->id]) }}">詳細</a>
                        </div>

                    </div>
                </div>
            </div>
    </a>
            <hr color="#c0c0c0">
            @endforeach
        </div>
    </div>
<div >
</div>

</div>

</div>

{{$posts->links()}}
@endsection

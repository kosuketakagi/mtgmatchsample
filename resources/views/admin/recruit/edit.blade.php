@extends('layouts.admin')
@section('title', 'asasa')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
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
                            <input type="text" class="form-control" name="title" value="{{ $recruits_form->title }}">
                        </div>
                    </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="time">時間</label>
                            <div class="col-md-10">
                                <input type="datetime-local" class="form-control" name="time" value="{{ $recruits_form->time }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2" for="format">フォーマット</label>
                            <div class="col-md-10">
                                <select type="text" class="form-control" name="format" value="{{ $recruits_form->format }}">
                                <option value="スタンダード">スタンダード</option>
                                <option value="モダン">モダン</option>
                                <option value="レガシー">レガシー</option>
                                <option value="統率者">統率者</option>
                                <option value="シールド">シールド</option>
                                <option value="ドラフト">ドラフト</option>
                                <option value="Pauper">Pauper</option>
                                <option value="旧枠モダン">旧枠モダン</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2" for="shop">ショップ名</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="shop" value="{{ $recruits_form->shop }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2" for="pref_id">都道府県</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="pref_id" value="{{ $recruits_form->pref_id}}">
                            </div>
                        </div>





                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $recruits_form->body }}</textarea>
                        </div>
                    </div>






                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $recruits_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.admin')
@section('title', '新規募集投稿')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="create">新規募集ページ</h2>
                <form action="{{ action('Admin\RecruitController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif

                        <div hidden>

                                <input type="text" class="form-control" name="user_id" value= "{{ $user->id }}">

                        </div>



                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>


                        <div class="form-group row">
                            <label class="col-md-2" for="time">遊びやすい日(平日or週末)</label>
                            <div class="col-md-10">
                                <select class="form-control" name="time" value="{{ old('time') }}">
                                    <option value="平日">平日</option>
                                    <option value="平日">平日の夜</option>
                                    <option value="週末">週末</option>
                                    <option value="いつでもオッケー">いつでもオッケー</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2" for="pref_id">都道府県</label>
                            <div class="col-md-10">

                                <select name="pref_id"　　value="{{ old('shop') }}">
                                    <option value="" selected>選んで下さい</option>
                                    <option value="北海道">北海道</option>
                                    <option value="青森県">青森県</option>
                                    <option value="岩手県">岩手県</option>
                                    <option value="宮城県">宮城県</option>
                                    <option value="秋田県">秋田県</option>
                                    <option value="山形県">山形県</option>
                                    <option value="福島県">福島県</option>
                                    <option value="茨城県">茨城県</option>
                                    <option value="栃木県">栃木県</option>
                                    <option value="群馬県">群馬県</option>
                                    <option value="埼玉県">埼玉県</option>
                                    <option value="千葉県">千葉県</option>
                                    <option value="東京都">東京都</option>
                                    <option value="神奈川県">神奈川県</option>
                                    <option value="新潟県">新潟県</option>
                                    <option value="富山県">富山県</option>
                                    <option value="石川県">石川県</option>
                                    <option value="福井県">福井県</option>
                                    <option value="山梨県">山梨県</option>
                                    <option value="長野県">長野県</option>
                                    <option value="岐阜県">岐阜県</option>
                                    <option value="静岡県">静岡県</option>
                                    <option value="愛知県">愛知県</option>
                                    <option value="三重県">三重県</option>
                                    <option value="滋賀県">滋賀県</option>
                                    <option value="京都府">京都府</option>
                                    <option value="大阪府">大阪府</option>
                                    <option value="兵庫県">兵庫県</option>
                                    <option value="奈良県">奈良県</option>
                                    <option value="和歌山県">和歌山県</option>
                                    <option value="鳥取県">鳥取県</option>
                                    <option value="島根県">島根県</option>
                                    <option value="岡山県">岡山県</option>
                                    <option value="広島県">広島県</option>
                                    <option value="山口県">山口県</option>
                                    <option value="徳島県">徳島県</option>
                                    <option value="香川県">香川県</option>
                                    <option value="愛媛県">愛媛県</option>
                                    <option value="高知県">高知県</option>
                                    <option value="福岡県">福岡県</option>
                                    <option value="佐賀県">佐賀県</option>
                                    <option value="長崎県">長崎県</option>
                                    <option value="熊本県">熊本県</option>
                                    <option value="大分県">大分県</option>
                                    <option value="宮崎県">宮崎県</option>
                                    <option value="鹿児島県">鹿児島県</option>
                                    <option value="沖縄県">沖縄県</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2" for="shop">ショップ名</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="shop" value="{{ old('shop') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2" for="format">対戦希望フォーマット</label>
                            <div class="col-md-10">
                                <select class="form-control" name="format" value="{{ old('format') }}">
                                    <option value="スタンダード">スタンダード</option>
                                    <option value="モダン">モダン</option>
                                    <option value="レガシー">レガシー</option>
                                    <option value="統率者">統率者</option>
                                    <option value="シールド">シールド</option>
                                    <option value="ドラフト">ドラフト</option>
                                    <option value="Pauper">Pauper</option>
                                    <option value="パイオニア">パイオニア</option>
                                    <option value="旧枠モダン">旧枠モダン</option>
                                </select>
                            </div>
                        </div>


{{--                        <div class="form-group row">--}}
{{--                            <label class="col-md-2" for="format">対戦希望フォーマット</label>--}}
{{--                            <div class="col-md-10">--}}
{{--                                @foreach ($tags as $tag)--}}
{{--                                    <input type="checkbox" name="format[]" value="{{ $tag->id }}">{{ $tag->name }}--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group row">
                        <label class="col-md-2" for="body">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="8">{{ old('body') }}</textarea>
                        </div>
                    </div>


                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
        </div>
    </div>
@endsection

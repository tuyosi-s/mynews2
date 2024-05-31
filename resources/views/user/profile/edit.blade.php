{{--layouts/frame.blade.phpを読み込む--}}
@extends('layouts.frame')
       
{{--frame.blade.phpの@yeld('title')に,プロフィール情報の更新を埋め込む--}}
@section('title','プロフィールの編集')
       
{{--frame.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')

    <div class ="container">
        <div class="row">
            <div class ="col-8 mx-auto">  
                <h2>プロフィールの編集</h2>
                <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                     {{--validationnに$errorsが１つでも入った場合は理由を表示--}}
                    @if(count($errors) > 0) 
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                         
                    <div class="form-group row mb-5">
                        <label classs="col-2">ユーザー名（ニックネームでもOK[）</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
                        </div>
                    </div>
                         
                    <div class="form-group row mb-5">
                        <label class="col-2">性別</label>
                        <div class="col-10">
                            <select name="gender">
                                <option value="">-</option>
                                <option value="男性">男性</option>
                                <option Vatue="女性">女性</option>
                                <option Vatue="どちらも選ばない">どちらも選ばない</option>
                            </select>
                        </div>
                    </div>
                         
                    <div class="form-group row mb-5">
                        <label classs="col-2">趣味</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="hobby"  value="{{ $profile->hobby }}">
                        </div>
                    </div>
                             
                    <div class="form-group row mb-5">
                        <label class="col-2">自己紹介</label>
                        <div class="col-10">
                            <textarea class="form-control" name="introduction" rows="20" cols="20">{{ $profile->introduction }}</textarea>
                        </div>
                    </div>
                         
                    <div class="form-group row mb-5">
                        <label class="col-2">画像</label>
                        <div class="col-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $profile->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                     <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                         
                    <div class="form-group row mb-5">
                        <label classs="col-2">マイページ名</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="page"  value="{{ $profile->page }}">
                        </div>
                    </div>
                         
                    <div class="form-group row mb-5">
                        <label class="col-2">マイページの説明</label>
                        <div class="col-10">
                            <textarea class="form-control" name="explain" rows="20" cols="20">{{ $profile->explain }}</textarea>
                        </div>
                    </div>
                        
                    <div class="form-group row mb-5">
                        <input type="hidden" name="id" value="{{ $profile->id }}">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="プロフィールの更新">
                    </div>
                </form>
                </div>    
        </div>  
    </div>
          
    <div>
                <a href="{{route('main')}}" class="btn btn-primary">メインページへ戻る</a>
                <a href="">ページ紹介へ移動する</a>
    </div>
@endsection

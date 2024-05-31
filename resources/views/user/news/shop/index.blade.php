{{--layouts/frame.blade.phpを読み込む--}}
@extends('layouts.frame')
       
{{--frame.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
@section('title','お店ニュースの投稿一覧')
       
{{--frame.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')
   <div class="container">  
        <h2>{{ $profile->name }}さんのページへようこそ</h2>
   </div>
   
   <div class="container">
        <div class="row">
            <h3>プロフィール紹介</h3>
             <!--$profileを２カラムで表示　左が画像で右が他のプロフィール情報-->
            <div class="col-4">
                <div class="caption mx-auto">
                    <div class="image">
                       {{--$profileの中に$profile->image_pathがある場合は一致するimageをstorage/imageから表示--}} 
                       @if ($profile->image_path)
                         <img src="{{ secure_asset('storage/image/' . $profile->image_path) }}" width="150">
                       @endif
                    </div>
                </div>
            </div>
            <div class="col-8">
                <table class="table table-dark">
                    <tr> <th>ユーザー名</th> <td>{{ $profile->name }}</td> </tr>
                    <tr> <th>性別</th> <td>{{ $profile->gender }}</td> </tr>
                    <tr> <th>趣味</th> <td>{{ $profile->hobby }}</td> </tr>
                    <tr> <th>自己紹介</th> <td>{{ $profile->introduction }}</td> </tr>
                    <tr> <th>ページ名</th> <td>{{ $profile->page }}</td> </tr>
                    <tr> <th>ページ紹介</th> <td>{{ $profile->explain }}</td> </tr>
                </table>
            </div>
        </div>
    </div>
   
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>投稿したお店</h3>
                <table class="table table-dark">
                    @foreach($shops as $shop)
                        <tr>
                            <th>店名</th>
                            <td>
                                <a href="{{route('user.news.item.index',$shop->id )}}">
                                   {{ $shop->shop_name }}
                                </a>
                            </td>
                        </tr>
                    @endforeach     
                </table>
            </div>
        </div>    
    </div>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-4"> 
                <!--<a href="{route'user.profile.edit')}}" class="btn btn-primary">プロフィールを変更する</a>-->
            </div>
        </div>
    </div>
 @endsection
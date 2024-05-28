@extends('layouts.profile')
       
       {{--admin.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
@section('title','あなたのお店一覧ページ')
       
       {{--admin.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')
<body>
   <div class="container">  
     <h2>あなたのお店一覧ページ</h2>
   </div>
   
   <div class="container">
     <h3>プロフィール情報</h3>
      <div class="image">
          @if ($profile->image_path)
             <img src="{{ secure_asset('storage/image/' . $profile->image_path) }}">
          @endif
      </div>
          <table class="table table-dark">
                  <tr><th>ユーザー名</th><td>{{ $profile->name }}</td></tr>
                  <tr><th>性別</th><td>{{ $profile->gender }}</td></tr>
                  <tr><th>趣味</th><td>{{ $profile->hobby }}</td></tr>
                  <tr><th>ページ名</th><td>{{ $profile->page }}</td></tr>
                  <tr><th>ページ紹介</th><td>{{ $profile->explain }}</td></tr>
                  <!--<tr><th>画像</th><td>{ $profile->image }}</td></tr>-->
          </table>
    </div>
    
    <div class="container">
     <table class="table table-dark">
             @foreach($shops as $shop)
                <tr>
                    <th>店名</th>
                    <td>
                         <a href="{{route('user.news.mypage.itemindex',$shop->id )}}">
                            {{ $shop->shop_name }}
                         </a>
                    </td>
                  < <td>
                    　　<div>
                        　<a href="{{ route('user.news.shop.edit', ['id' => $shop->id]) }}">編集</a>
                         </div>
                    　　<div>
                             <a href="{{ route('user.news.shop.delete', ['id' => $shop->id]) }}">削除</a>
                        </div>
                    </td>
                    <td>
                    
                @foreach($items as $item)
                  <tr>
                      @if($shop->id == $item->shop_id)
                         <th>品名</th>
                         <td>
                              <a href="{{route('user.news.mypage.itemindex',$item->id )}}">
                             {{$item->item_name}} 
                             </a>
                      @endif     
                  </tr>
                @endforeach
            
     </table>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4"> 
                <a href="{{route('user.profile.edit',['id' => $profile->id] )}}" class="btn btn-primary">プロフィールを変更する</a>
            </div>
        </div>
    </div>
      @endsection
      
      
      <!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <!--meta http-equiv="X-UA-Compatible"を追加するとInternetExplorに互換性を持つモードを指定できる-->
    <!-- http-equiv（指示の種類）="X-UA-Compatible（IEに関する互換性のモード）" content=（指示の内容）"IE=edge（最上位のモード）"-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--viewportはブラウザ画面幅のイメージ。デバイス幅に応じてブラウザ画面幅を調整してくれるようにする-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
　　<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
</head>

<body>
    
    
    <!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <!--meta http-equiv="X-UA-Compatible"を追加するとInternetExplorに互換性を持つモードを指定できる-->
    <!-- http-equiv（指示の種類）="X-UA-Compatible（IEに関する互換性のモード）" content=（指示の内容）"IE=edge（最上位のモード）"-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--viewportはブラウザ画面幅のイメージ。デバイス幅に応じてブラウザ画面幅を調整してくれるようにする-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
　　<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
</head>

<body>
    <nav class="navbar navbar-dark" style="background-color:#e3f2fd;">
      <div class="container">
         <div class="row">
            <div class="col-8">
               <h5>マイグルメログ</h5>
            </div>
            <div class="col-4">
               <ul class="navbar-nav list-group-horizontal">
                 <li><a href="/">メインページ</a></li>
                 <li><a href="/login">login</a></li>
               </ul>
            </div>
         </div>
      </div>
    </nav>
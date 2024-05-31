{{--layouts/frame.blade.phpを読み込む--}}
@extends('layouts.frame')
       
{{--frame.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
@section('title','あなたのプロフィールとお店のニュース一覧')
       
{{--frame.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')

   <div class="container">  
      <h3>あなたのページを作成１</h3>
      <h5>あなたのプロフィール・ページの詳細と編集／あなたのお店ニュース一覧</h5>
   </div>
   
   <div class="container">
        <label>あなたのプロフィールとページ</label>
        <div class="row">
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
               
          　<div>
          　    <a href="{{ route('user.profile.edit', ['id' => $profile->id]) }}">あなたのプロフィールを編集する</a>
            </div>
          　<div>
          　    <a href="{{ route('user.profile.delete', ['id' => $profile->id]) }}">あなたのプロフィールを削除する</a>
            </div>
        </div>    
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <label>あなたのお店ニュース</label>
                    <div>
          　             <a href="{{route('user.news.shop.add',$profile->id) }}">お店ニュースを新たに投稿する</a>
          　         </div>
          　     
                <label>あなたの投稿したお店ニュース一覧</label>
                <table class="table table-dark">
                    @foreach($shops as $shop)
                        <tr>
                            <th>店名</th>
                            <td>
                                <a href="{{route('user.news.mypage.itemindex',['id' =>$shop->id] )}}">
                                    {{ $shop->shop_name }}
                                </a>
                            </td>
                            <td>
                                <div>
                                    <a href="{{ route('user.news.shop.edit', ['id' => $shop->id]) }}">編集</a>
                                </div>
                            
                                <div>
                                    <a href="{{ route('user.news.shop.delete', ['id' => $shop->id]) }}">削除</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
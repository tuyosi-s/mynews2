@extends('layouts.profile')
       
       {{--admin.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
@section('title','あなたのお店一覧ページ')
       
       {{--admin.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')

   <div class="container">  
     <h2>あなたのページを作成１</h2>
     <h2>あなたのプロフィールとマイページの確認と編集、あなたのお店投稿一覧</h2>
   </div>
   
   <div class="container">
      <h3>あなたのプロフィールとマイページ</h3>
        <div class="row">
            <div class="col-4">
                <div class="caption mx-auto">
                    <div class="image">
                       @if ($profile->image_path)
                         <img src="{{ secure_asset('storage/image/' . $profile->image_path) }}" width="150">
                       @endif
                    </div>
                </div>
            </div>
            
            <div class="col-8">
     
               <table class="table table-dark">
                  <tr><th>ユーザー名</th><td>{{ $profile->name }}</td></tr>
                  <tr><th>性別</th><td>{{ $profile->gender }}</td></tr>
                  <tr><th>趣味</th><td>{{ $profile->hobby }}</td></tr>
                  <tr><th>自己紹介</th><td>{{ $profile->introduction }}</td></tr>
                  <tr><th>ページ名</th><td>{{ $profile->page }}</td></tr>
                  <tr><th>ページ紹介</th><td>{{ $profile->explain }}</td></tr>
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
        <table class="table table-dark">
           <h3>あなたのお店投稿</h3>
                <div>
          　         <a href="{{route('user.news.shop.add',$profile->id) }}">お店を新たに投稿する</a>
          　     </div>
          　     
          <h3>あなたの投稿したお店一覧</h3>
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
@endsection
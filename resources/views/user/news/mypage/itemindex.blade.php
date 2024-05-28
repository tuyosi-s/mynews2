@extends('layouts.profile')
       
       {{--admin.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
@section('title','品物の投稿一覧ページ')
       
       {{--admin.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')
<body>
   <div class="container">  
      <h2>あなたのページを作成２</h2>
   </div>
   
   <div class="container">
       <h3>『{{ $shop->shop_name }}』　についての詳細を確認</h3>
            <table class="table table-dark">
                  <tr><th>店名</th><td>{{ $shop->shop_name }}</td></tr>
                  <tr><th>TEL</th><td>{{ $shop->tel }}</td></tr>
                  <tr><th>住所</th><td>{{ $shop->address }}</td></tr>
                  <tr><th>URL</th><td>{{ $shop->url }}</td></tr>
                  <!--<tr><th>画像</th><td>{ $profile->image }}</td></tr>-->
            </table>
            
       <h3>『{{ $shop->shop_name }}』　について、あなたの品物投稿</h3>
            <div>
                 <a href="{{ route('user.news.item.add',$shop->id) }}" >品物を新たに投稿する</a>
            </div>

 　　　<h3>『{{ $shop->shop_name }}』　について、あなたの投稿した品物一覧</h3>            
            <table class="table table-dark">
               @foreach($items as $item)
                  <tr><th>品物</th>
                      <td>
                           <a href="{{route('user.news.mypage.itemshow',[ 'id'=>$item->id ] )}}">
                               {{ $item->item_name }}
                           </a>
                      </td>
                      <td>
                         <div>
                           <a href="{{route('user.news.item.edit',['id' => $item->id ,'shop_id'=>$shop->id ]) }}">編集</a>   
                     　　</div>
                     　　
                     　　<div> 
                     　　 <a href="{{ route('user.news.item.delete',['id' => $item->id ]) }}">削除</a> 
                     　　</div>
                  </tr>
               @endforeach     
            </table>
    </div>
    
@endsection
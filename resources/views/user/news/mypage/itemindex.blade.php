{{--layouts/frame.blade.phpを読み込む--}}
@extends('layouts.frame')
       
{{--frame.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
@section('title','あなたのお店ニュースと品物ニュースの一覧ページ')
       
{{--frame.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')
<body>
   <div class="container"> 
   
      <h2>あなたのページを作成２</h2>
   </div>
   
   <div class="container">
       <div class ="row">
           <div class ="col">
               <h3>『{{ $shop->shop_name }}』　についてのニュース詳細</h3>
                  <table class="table table-dark">
                     <tr><th>店名</th><td>{{ $shop->shop_name }}</td></tr>
                     <tr><th>TEL</th><td>{{ $shop->tel }}</td></tr>
                     <tr><th>住所</th><td
                     >{{ $shop->address }}</td></tr>
                     <tr> 
                          <th>URL</th>
                          {{--記載してあるurlへジャンプ--}}
                          <td> <a href="{{ route('user.news.shop.jump',$shop->id) }}"> {{ $shop->url }} </a> </td> 
                     </tr>
                  </table>
            
            
                  <div>
                      <a href="{{ route('user.news.item.add',$shop->id) }}" >『{{ $shop->shop_name }}』　について品物のニュースを新たに書く</a>
                  </div>
            
                  <label>『{{ $shop->shop_name }}』　について、あなたの品物ニュースの一覧</label>            
                       <table class="table table-dark">
                           @foreach($items as $item)
                              <tr>  <th>品物</th>
                                    <td>
                                       <div>
                                          <a href="{{route('user.news.mypage.itemshow',[ 'id'=>$item->id ] )}}">
                                               {{ $item->item_name }}
                                          </a>
                                       </div>   
                                    </td>
                                     
                                    <td>
                                       <div>
                                          <a href="{{route('user.news.item.edit',['id' => $item->id ,'shop_id'=>$shop->id ]) }}">編集</a>
                                       </div>
                                       <div>
                                          <a href="{{ route('user.news.item.delete',['id' => $item->id ]) }}">削除</a>
                                       </div>
                                    </td>
                                 </tr>
                           @endforeach     
            </table>
    </div>
    
@endsection
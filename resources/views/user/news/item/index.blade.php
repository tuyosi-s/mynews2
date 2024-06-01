{{--layouts/frame.blade.phpを読み込む--}}
@extends('layouts.frame')
       
{{--frame.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
@section('title','お店ニュースの詳細と品物ニュースの一覧')
       
{{--frame.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')
   <div class="container">
       <div class="row">
           <div class="col">
              <h3>『{{ $shop->shop_name }}』　についてのニュース詳細</h3>
                 <table class="table table-dark">
                     <tr> <th>店名</th> <td>{{ $shop->shop_name }} </td> </tr>
                     <tr> <th>TEL</th>  <td>{{ $shop->tel }} </td> </tr>
                     <tr> <th>住所</th> <td>{{ $shop->address }} </td> </tr>
                     <tr> 
                          <th>URL</th>
                          {{--記載してあるurlへジャンプ--}}
                          <td> <a href="{{ route('user.news.shop.jump',$shop->id) }}"> {{ $shop->url }} </a> </td> 
                     </tr>
                 </table>
                     
              <h3>『{{ $shop->shop_name }}』　の品物ニュース一覧</h3>
                 <table class="table table-dark">
                     @foreach($items as $item)
                         <tr>
                            <th>品名</th>
                            <td>
                                <a href="{{route('user.news.item.show',$item->id )}}">
                                   {{ $item->item_name }}
                                </a>
                            </td>
                         </tr>
                     @endforeach     
                 </table>
           </div>
       </div>   
   </div>
@endsection
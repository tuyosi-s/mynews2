  {{--layouts/admin.blade.phpを読み込む--}}
       @extends('layouts.profile')
       
       {{--admin.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
       @section('title','お店の新規投稿ページ')
       
       {{--admin.blade.phpの@yield('content')に以下のタグを埋め込む--}}    
       @section('content')
          <div class ="container">
                <h2>新規投稿・お店の情報</h2>
            　　@if(session('message'))
               　{{session('message')}}
              　@endif
              　
            　　<form action="{{route('user.news.shop.create')}}" method="post" enctype="multipart/form-data">
                @if(count($errors) > 0) 
                    <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                    </ul>
                @endif
                   <div class="row">
                       <div class ="col-6">
                         <h3>お店の情報</h3> 
                         <div class="form-group row mb-5">
                             <label classs="col-2">店名</label>
                             <div class="col-10">
                                 <input type="text" class="form-control" name="shop_name" value="{{ old('shop_name')}}">
                             </div>
                         </div>
                         <div class="form-group row mb-5">
                             <label classs="col-2">TEL</label>
                              <div class="col-10">
                                 <input type="text" class="form-control" name="tel" value="{{ old('tel')}}">
                             </div>
                         </div>
                         <div class="form-group row mb-5">
                             <label classs="col-2">住所</label>
                             <div class="col-10">
                                 <input type="text" class="form-control" name="address" value="{{ old('address')}}">
                             </div>
                         </div>
                         <div class="form-group row mb-5">
                             <label classs="col-2">URL</label>
                             <div class="col-10">
                                 <input type="text" class="form-control" name="url" value="{{ old('url')}}">
                             </div>
                         </div>
                         @csrf
                    　</div>
                    <div class="form-group row mb-5">
                              <input type="submit" class="btn btn-primary" value="投稿する">
                    </div>
                </form>
              </div>
              
              @if(session('message'))
               {{session('message')}}
              @endif
              
          <div>
                <a href="{{route('main')}}" class="btn btn-primary">メインページへ戻る</a>
                <a href="{{route('user.news.item.add', ['profile' => $profile])}}" class="btn btn-primary">品物の投稿をする</a>
          </div>
       @endsection

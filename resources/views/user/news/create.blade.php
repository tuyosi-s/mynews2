  {{--layouts/admin.blade.phpを読み込む--}}
       @extends('layouts.profile')
       
       {{--admin.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
       @section('title','記事の新規投稿ページ')
       
       {{--admin.blade.phpの@yield('content')に以下のタグを埋め込む--}}
       @section('content')
          <div class ="container">
                <h2>新規投稿</h2>
            　　<form action="{{route('user.news.create')}}" method="post" enctype="multipart/form-data">
                @if(count($errors) > 0) 
                    <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                    </ul>
                @endif
                   <div class="row">
                      <div class ="col-6">    
                         <h3>品物情報</h3>
                         <div class="form-group row mb-5">
                             <label classs="col-2">品名</label>
                             <div class="col-10">
                                 <input type="text" class="form-control" name="item_name" value="{{ old('item_name')}}">
                             </div>
                         </div>
                        
                         <div class="form-group row mb-5">
                              <label class="col-2">画像</label>
                              <div class="col-10">
                                  <input type="file" class="form-control-file" name="item_image">
                              </div>
                         </div>
                         
                        <div class="form-group row mb-5">
                             <label class="col-2">コメント</label>
                             <div class="col-10">
                                 <textarea class="form-control" name="comment" rows="20" cols="20">{{ old('comment') }}</textarea>
                             </div>
                         </div> 
                         
                         <div class="form-group row mb-5">
                             <label classs="col-2">点数</label>
                             <div class="col-10">
                                 <input type="text" class="form-control" name="score" value="{{ old('score')}}">
                             </div>
                         </div>
                      </div>
                      
                      <div class ="col-6">
                         <h3>店情報</h3> 
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
                              @if(session('message'))
                                 {{session('message')}}
                              @endif
                    </div>
                </form>
              </div>
          @if(session('message'))
            {{session('message')}}
          @endif
          <div>
                <a href="{{route('main')}}" class="btn btn-primary">メインページへ戻る</a>
                <a href="">ページ紹介へ移動する</a>
          </div>
       @endsection

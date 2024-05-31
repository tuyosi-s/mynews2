{{--layouts/frame.blade.phpを読み込む--}}
@extends('layouts.frame')
       
{{--frame.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
@section('title','お店ニュースの新規投稿')
       
{{--frame.blade.phpの@yield('content')に以下のタグを埋め込む--}}    
@section('content')

    <div class ="container">
        <div class="row">
            <div class ="col">
                <h2>お店ニュースの新規投稿</h2>  　
                <form action="{{route('user.news.shop.create')}}" method="post" enctype="multipart/form-data">
                     {{--validationnに$errorsが１つでも入った場合は理由を表示--}}
                    @if(count($errors) > 0) 
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                            
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
                    <div class="form-group row mb-5">
                        <input type="submit" class="btn btn-primary" value="投稿する">
                    </div>
                </form>
            </div>          
        <div>
    <div>                
              
          <div>
                <a href="{{route('main')}}" class="btn btn-primary">メインページへ戻る</a>
                <a href="{{route('user.news.item.add', ['profile' => $profile])}}" class="btn btn-primary">品物の投稿をする</a>
          </div>
       
@endsection

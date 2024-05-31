{{--layouts/frame.blade.phpを読み込む--}}
@extends('layouts.frame')
       
{{--frame.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
@section('title','お店ニュースの編集')
       
{{--frame.blade.phpの@yield('content')に以下のタグを埋め込む--}}    
@section('content')


    <div class ="container">
        <div class="row">
            <div class ="col">
                <h2>お店ニュースの編集</h2>
                <form action="{{route('user.news.shop.edit')}}" method="post" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="shop_name" value="{{ $shop->shop_name }}">
                         </div>
                    </div>
                           
                    <div class="form-group row mb-5">
                        <label classs="col-2">TEL</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="tel" value="{{ $shop->tel }}">
                        </div>
                    </div>
                            
                    <div class="form-group row mb-5">
                        <label classs="col-2">住所</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="address" value="{{ $shop->address }}">
                        </div>
                    </div>
                            
                    <div class="form-group row mb-5">
                        <label classs="col-2">URL</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="url" value="{{ $shop->url }}">
                        </div>
                    </div>
                    　 
                    <div class="form-group row mb-5">
                        <input type="hidden" name="id" value="{{ $shop->id }}">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="店の情報を編集する">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

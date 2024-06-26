{{--layouts/frame.blade.phpを読み込む--}}
@extends('layouts.frame')
       
{{--frame.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
@section('title','品物ニュースの新規投稿')
       
{{--frame.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')

    <div class ="container">
            <h2>品物ニュースの新規投稿</h2>
            <form action="{{route('user.news.item.create')}}" method="post" enctype="multipart/form-data">
                {{--validationnに$errorsが１つでも入った場合は理由を表示--}}
                @if(count($errors) > 0) 
                    <ul>
                       @foreach($errors->all() as $e)
                           <li>{{ $e }}</li>
                       @endforeach
                    </ul>
                @endif
            
                <!--2カラムで表示　左が品物情報　右が店情報（店情報はセレクトボックスで選択）-->
                <div class="row">
                    <div class ="col-6">    

                    
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
                            <label classs="col-2"> 点数(10点満点/星の数で記載) </label>
                            <select name="score">
                                <option value="">-</option>
                                {{--selectboxに数字１～10までを$1から$10で格納・表示する--}}
                                @for ($i = 1; $i <= 10; $i++)
                                    <option ="{{$i}}"> {{ $i }} </option>
                                @endfor
                            </select> 
                        </div>
                    </div>
                      
                    <div class ="col-6">
                        <div class="form-group row mb-5">
                            <label>お店の情報</label>
                            <table class="table table-dark">
                               <tr> <th>店名</th> <td>{{ $shop->shop_name }}</td> </tr>
                               <tr> <th>TEL</th> <td>{{ $shop->tel }}</td> </tr>
                               <tr> <th>住所</th> <td>{{ $shop->address }}</td> </tr>
                               <tr> <th>URL</th> <td>{{ $shop->url }}</td> </tr>
                            </table>
                        </div>
                    </div> 
                        
                        
{{--                    <label class="col-2">お店の情報</label>
                        <div class="col-10">
                            <table border='2'>
                                <tr>
                                    <th>店id /</th>
                                    <th>店名 /</th>
                                    <th>TEL /</th>
                                    <th>住所 /</th>
                                    <th>URL </th>
                                </tr>
                            </table>
                            {{--お店はprofile_idでリレーションされているShopmodelを$shopに格納してselectboxで選択する--}}        
{{--                             <select name="shop_id">
                                <table border='2'>
                                    <option value="">-</option>
                                    @foreach($shops as $shop)
                                        <option value="{{$shop->id}}">
                                            <tr>
                                                <td>{{$shop->id}}/</td>
                                                <td>{{$shop->shop_name}}/</td>
                                                <td>{{$shop->tel}}/</td>
                                                <td>{{$shop->address}}/</td>
                                                <td>{{$shop->url}}</td>
                                            </tr>
                                        </option>
                                    @endforeach
                                </table>
                            </select>
--}}                            
                </div>
                
                <div class="form-group row mb-5">
                　　<input type="hidden" name="shop_id" value="{{ $shop->id }}">
                　　@csrf
                    <input type="submit" class="btn btn-primary" value="投稿する">
                </div>
            </form>
        </div>    
    </div>                
@endsection
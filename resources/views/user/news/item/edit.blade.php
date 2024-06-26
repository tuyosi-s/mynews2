{{--layouts/frame.blade.phpを読み込む--}}
@extends('layouts.frame')
       
{{--frame.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
@section('title','品物ニュースの編集')
       
{{--frame.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')
    <div class ="container">
        <h2>品物ニュースの編集</h2>
            <div class="row">
                <div class ="col-6">
                    <form action="{{route('user.news.item.edit')}}" method="post" enctype="multipart/form-data">
                         {{--validationnに$errorsが１つでも入った場合は理由を表示--}}
                        @if(count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        @endif
                             
                        <div class="form-group row mb-5">
                            <label classs="col-2">品名</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="item_name" value="{{ $item->item_name }}">
                            </div>
                        </div>
                                
                        <div class="form-group row">
                            <label class="col-md-2" for="image">画像</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control-file" name="item_image">
                                <div class="form-text text-info">
                                    設定中: {{ $item->image_path }}
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                    </label>
                                </div>
                            </div>
                        </div>
                             
                        <div class="form-group row mb-5">
                            <label class="col-2">コメント</label>
                            <div class="col-10">
                                <textarea class="form-control" name="comment" rows="20" cols="20">{{ $item->comment }}</textarea>
                            </div>
                        </div> 
                                
                        <div class="form-group row mb-5">
                            <label classs="col-2"> 点数(10点満点/星の数で記載) </label>
                            <select name="score">
                                <option value="">-</option>
                                {{--selectboxに$1から$10までを格納する--}}
                                @for ($i = 1; $i <= 10; $i++)
                                    <option ="{{$i}}"  @if($item->score==$i) selected @endif> {{ $i }} </option>
                                @endfor
                            </select> 
                        </div>
                                
                        <div class="form-group row mb-5">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="投稿する">
                        </div>
                    </form>
                </div>
                     
                     
                <div class ="col-6">
                    <label>お店の情報</label>
                    <table class="table table-dark">
                        <tr> <th>店名</th> <td>{{ $shop->shop_name }}</td> </tr>
                        <tr> <th>TEL</th> <td>{{ $shop->tel }}</td> </tr>
                        <tr> <th>住所</th> <td>{{ $shop->address }}</td> </tr>
                        <tr> <th>URL</th> <td>{{ $shop->url }}</td> </tr>
                    </table>
                </div>
            </div>
    </div>
@endsection
  {{--layouts/admin.blade.phpを読み込む--}}
       @extends('layouts.profile')
       
       {{--admin.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
       @section('title','品物の新規投稿ページ')
       
       {{--admin.blade.phpの@yield('content')に以下のタグを埋め込む--}}
       @section('content')
          <div class ="container">
                <h2>新規投稿・品物の情報</h2>
            　　<form action="{{route('user.news.item.create')}}" method="post" enctype="multipart/form-data">
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
                             <label classs="col-2"> 点数(10点満点/星の数で記載) </label>
                                <select name="score">
                                   <option value="">-</option>
                                   @for ($i = 1; $i <= 10; $i++)
                                   <option ="{{$i}}"> {{ $i }} </option>
                                   @endfor
                                </select> 
                             </div>
                         </div>
                      
                      <div class ="col-6">
                          <div class="form-group row mb-5">
                             <label class="col-2">お店の選択</label>
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
                             
                                 <select name="shop_id">
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
                               </div>
                          </div>
                    　</div>
                  @csrf
                </form>
                
                    <div class="form-group row mb-5">
                              <input type="submit" class="btn btn-primary" value="投稿する">
                        @if(session('message'))
                        　{{session('message')}}
                        @endif
                    </div>
          <div>
                <a href="{{route('main')}}" class="btn btn-primary">メインページへ戻る</a>
                <a href="">ページ紹介へ移動する</a>
          </div>
       @endsection

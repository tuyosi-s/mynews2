 @extends('layouts.profile')
       
       {{--admin.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
 @section('title','品物の投稿詳細ページ')
       
       {{--admin.blade.phpの@yield('content')に以下のタグを埋め込む--}}
 @section('content')
   <div class="container">  
      <h2>あなたのページを作成3</h2>
      <h2>あなたの投稿した『{{ $item->item_name }}』について、コメントと評価</h2>
   
   </div>
          <div class ="container">
                   <div class="row">
                      <div class="col-4">
                          <div class="caption mx-auto">
                              <div class="image">
                                  @if ($item->item_image_path)
                                     <img src="{{ secure_asset('storage/image/' . $item->item_image_path) }}" width="150">
                                  @endif
                              </div>
                          </div>
                      </div>
                      
                      <div class ="col-8">
                         <div class="form-group row mb-5">
                             <div class="col-10">
                                 <table border='2'>
                                    <tr><th>品名</th><td> {{ $item->item_name }} </td></tr>
                                    <tr><th>コメント</th><td> {{ $item->comment }} </td></tr>
                                    <tr><th>評価</th><td> {{ str_repeat('★',$item->score) }} </td></tr>
                                 </table>
                             </div>
                         </div>
                    　</div>
                   </div>
          </div>      
  @endsection

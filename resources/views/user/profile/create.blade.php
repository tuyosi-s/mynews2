       {{--layouts/admin.blade.phpを読み込む--}}
       @extends('layouts.profile')
       
       {{--admin.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
       @section('title','プロフィール新規作成')
       
       {{--admin.blade.phpの@yield('content')に以下のタグを埋め込む--}}
       @section('content')
          <div class ="container">
              <div class="row">
                <div class ="col-8 mx-auto">  
                     <h2>プロフィール新規作成</h2>
                     <form action="{{route('user.profile.create')}}" method="post" enctype="multipart/form-data">
                         @if(count($errors) > 0) 
                            <ul>
                                @foreach($errors->all() as $e)
                                  <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                         @endif
                         
                         <div class="form-group row mb-5">
                             <label classs="col-2">ユーザー名（ニックネームでもOK[）</label>
                             <div class="col-10">
                                 <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                             </div>
                         </div>
                         
                         <div class="form-group row mb-5">
                             <label class="col-2">性別</label>
                             <div class="col-10">
                             <select name="gender">
                                 <option value="">-</option>
                                 <option value="男性">男性</option>
                                 <option Vatue="女性">女性</option>
                                 <option Vatue="どちらも選ばない">どちらも選ばない</option>
                             </select>
                             </div>
                         </div>
                         
                         <div class="form-group row mb-5">
                             <label classs="col-2">趣味</label>
                             <div class="col-10">
                                 <input type="text" class="form-control" name="hobby" value="{{ old('hobby')}}">
                             </div>
                         </div>
                             
                    　　 <div class="form-group row mb-5">
                             <label class="col-2">自己紹介</label>
                             <div class="col-10">
                                 <textarea class="form-control" name="introduction" rows="20" cols="20">{{ old('insroduction') }}</textarea>
                             </div>
                         </div>
                         
                         <div class="form-group row mb-5">
                              <label class="col-2">画像</label>
                              <div class="col-10">
                                  <input type="file" class="form-control-file" name="image">
                              </div>
                         </div>
                         
                          <div class="form-group row mb-5">
                             <label classs="col-2">マイページ名</label>
                             <div class="col-10">
                                 <input type="text" class="form-control" name="page" value="{{ old('')}}">
                             </div>
                         </div>
                         
                         <div class="form-group row mb-5">
                             <label class="col-2">マイページの説明</label>
                             <div class="col-10">
                                 <textarea class="form-control" name="explain" rows="20" cols="20">{{ old('explain') }}</textarea>
                             </div>
                         </div>
                              @csrf
                          <div class="form-group row mb-5">
                              <input type="submit" class="btn btn-primary" value="新規入力">
                          </div>
                     </form>
                </div>    
              </div>  
          </div>
          <div>
                <a href="{{route('main')}}" class="btn btn-primary">メインページへ戻る</a>
                <a href="{{route('user.news.shop.create')}}" class="btn btn-primary">お店の投稿をする</a>
          </div>
       @endsection

{{--layouts/frame.blade.phpを読み込む--}}
@extends('layouts.frame')
       
{{--frame.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
@section('title','Main')
       
{{--frame.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')
    
   <div class="container">
        <div class="row">
            <div class="col">
                <h2>Main みんなのページ紹介</h2>
                <!--ページ名のキーワード検索　フォーム内に記入された$page_keywordを送る-->
                <form action="{{ route('main') }}" method="get">
                     <div class="form-group row">
                        <label class="col-md-2">ページ名(キーワード)の検索</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="page_keyword" value="{{$page_keyword}}">
                        </div>
                            
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                     </div>
                </form>
            </div>
        </div>
        
        <div class="row">
            <div class="col">             
                <table class="table table-dark">
                    @foreach($profiles as $profile)
                        <tr>
                            <th>ページ名</th>
                            <td>
                               <a href="{{route('user.news.shop.index',$profile->id )}}">
                                  {{ $profile->page }}
                               </a>
                            </td>
                        </tr>
                        <tr> <th>ユーザー名</th> <td>{{ $profile->name }}</td> </tr>
                        <tr> <th>ページ紹介</th> <td>{{ $profile->explain }}</td> </tr>
                    @endforeach     
                </table>
            </div>
        </div>    
    </div>
    
    <div class="container">
        <div class="row">
            {{--profieがない場合「マイページを作る」を表示する　ある場合「マイページに移動する」を表示する--}}
            @if(!$has_profile)
               <div class="col-md-4"> 
                    <a href="{{route('user.profile.create')}}" class="btn btn-primary">マイページを作る</a>
               </div>
            @else
               <div class="col-md-4"> 
                     <a href="{{route('user.news.mypage.shopindex')}}" class="btn btn-primary">マイページに移動する</a>
               </div>
            @endif
        </div>
    </div>

@endsection
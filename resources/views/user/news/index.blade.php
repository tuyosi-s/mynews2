<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <!--meta http-equiv="X-UA-Compatible"を追加するとInternetExplorに互換性を持つモードを指定できる-->
    <!-- http-equiv（指示の種類）="X-UA-Compatible（IEに関する互換性のモード）" content=（指示の内容）"IE=edge（最上位のモード）"-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--viewportはブラウザ画面幅のイメージ。デバイス幅に応じてブラウザ画面幅を調整してくれるようにする-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
　　<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
</head>

<body>
 <div class="container">
   <div class="row">
       <h2>ページ紹介</h2>
   </div>
   <div class="row">
         <!--<form action="   {route 'admin.news.index')}}" method="get">
             <div class="form-group row">
                <label class="col-md-2"></label>
                <div class="col-md-8">
                   <input type="text" class="form-control" name="cond_title" value="{$cond_title}}">
                </div>
                <div class="col-md-2">
                   @csrf
                   <input type="submit" class="btn btn-primary" value="検索">
                </div>
             </div>   
         </form>-->
      
            <table class="table table-dark">
               <h2>ページ投稿者の紹介</h2>
                 <thead>
                    <tr>
                       <th width="10%">名前</th>
                       <th width="10%">性別</th>
                       <th width="10%">趣味</th>
                       <th width="10%">ページタイトル<th>
                       <th width="60%">ページ紹介</th>
                    </tr>
               </thead>
                        
               <tbody> 
                    <tr>
                       <td>{{ $profile->name }}</td>
                       <td>{{ $profile->gender }}</td>
                       <td>{{ $profile->hobby }}</td>
                       <td>{{ $profile->page }}</td>
                       <td>{{ $profile->introduction }}</td>
                    </tr>
               </tbody>
            </table>
             <table class="table table-dark">
   </div>            <h2>投稿の紹介</h2>
                 <thead>
                    <tr>
                       <th width="10%">品名</th>
                       <th width="10%">店名</th>
                    </tr>
               </thead>
                        
               <tbody> 
                    <tr>
                       <td>{{ $profile->shop->item->item_name }}</td>
                       <td>{{ $profile->shop->shop_name }}</td>
                    </tr>
 </div>
</body>
               
               
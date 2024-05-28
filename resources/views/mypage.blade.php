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
    <h2>あなたのページ</h2>
   </div>
   
   <div class="container">
       <h3>プロフィール情報</h3>
            <table class="table table-dark">
             @foreach($profiles as $profile)
                  <tr><th>ユーザー名</th><td>{{ $profile->name }}</td></tr>
                  <tr><th>性別</th><td>{{ $profile->gender }}</td></tr>
                  <tr><th>趣味</th><td>{{ $profile->hobby }}</td></tr>
                  <tr><th>ページ名</th><td>{{ $profile->page }}</td></tr>
                  <tr><th>ページ紹介</th><td>{{ $profile->explain }}</td></tr>
                  <!--<tr><th>画像</th><td>{{ $profile->image }}</td></tr>-->
             @endforeach     
             </table>
    </div>
     <table class="table table-dark">
             @foreach($items as $item)
                  <tr><th>ページ名</th>
                      <td>
                        <a href="{{route('user.news.item.show',$item->id )}}">
                           {{ $item->item_name }}
                        </a>
                      </td>
                  </tr>
             @endforeach     
             </table>
    
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-4"> 
                <a href="{{route('user.profile.add')}}" class="btn btn-primary">マイページを作る</a>
            </div>
        </div>
    </div>
</body>

</html>
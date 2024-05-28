<!DOCTYPE html>
<html lang ="{{ app()->getLocale()}}" >
    <head>
        <meta charset ="utf-8">
        <meta http-equiv ="Xf-UA-Compatible"content ="IE=edge">
        <meta name ="viewport" content ="width=device-width=device-width,initial-scale=1" >
        
        <!--CSRF Token-->
        <meta name ="csrf-token" content ="{{ csrf_token() }}">
        
        <title>@yield('title')</title>
        
        <!--Scripts-->
        <script src ="{{ secure_asset('js')}}" defer> </script>
        
        <!--Fonts-->
        <link rel ="dns-prefetch" href = "https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        
        <!--Styles-->
        <link href ="{{secure_asset('css/app.css')}}" rel="stylesheet">
        <link href ="{{secure_asset('css/admin.css')}}" rel="stylesheet">
    </head>
        
    <body>
        <div id ="app">
        <!--画面上部に表示するナビゲーションバー-->
            <nav class="navbar navbar-dark" style="background-color:#e3f2fd;">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <h5>マイグルメログ</h5>
                        </div>
                        <div class="col-4">
                            <ul class="navbar-nav list-group-horizontal">
                               <li><a href="/">メインページ</a></li>
                               <li><a href="/login">login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

                        {{-- 以下を追記 --}}
                        <!-- Authentication Links -->
                        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                            <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                 </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('messages.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                            {{-- 以上までを追記 --}}
                        </ul>
                      
                  </div>
               </div>
            </nav>
            <!--ここまでナビゲーションバー-->
          <main class ="py-4">
              {{--コンテンツをここに入れる為、@yieldで空けておく--}}
              @yield('content')
          </main>
        </div>  
    </body>
        
</html>

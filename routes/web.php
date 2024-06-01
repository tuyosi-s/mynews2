<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('main', function () {
//    return view('main');
//})->name('main');

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\NewsController;


//下記はlogin前でも表示されるメインページへのroute
Route::get('/',[ProfileController::class,'index'])->name('main');

//下記までlogin前でも表示される閲覧の為の、それぞれshop.indexページ、item.indexページ、item.showページへのroute
Route::controller(NewsController::class)->prefix('user')->name('user.')->group(function(){
    Route::get('news/shop/index/{id}','shopindex')->name('news.shop.index');
    Route::get('news/item/index/{id}','itemindex')->name('news.item.index');
    Route::get('news/item/show/{id}','itemshow')->name('news.item.show'); 
    Route::get('news/shop/jump/{id}','shopjump')->name('news.shop.jump');
});


//login後はprofile入力、sho@入力、item入力が出来る下記のrouteへ行けるようにする
Route::controller(ProfileController::class)->prefix('user')->name('user.')->middleware('auth')->group(function(){
    Route::get('profile/create','add')->name('profile.add');
    Route::post('profile/create','create')->name('profile.create');
    Route::get('profile/edit', 'edit')->name('profile.edit');
    Route::post('profile/edit', 'update')->name('profile.update');
    Route::get('profile/delete', 'delete')->name('profile.delete');
});
    


Route::controller(NewsController::class)->prefix('user')->name('user.')->middleware('auth')->group(function(){
    Route::get('news/shop/create/{id}','shopadd')->name('news.shop.add');
    Route::post('news/shop/create','shopcreate')->name('news.shop.create');
    Route::get('news/shop/edit','shopedit')->name('news.shop.edit');
    Route::post('news/shop/edit', 'shopupdate')->name('news.shop.update');
    Route::get('news/shop/delete', 'shopdelete')->name('news.shop.delete');
//    Route::get('news/shop/index/{id}','shopindex')->name('news.shop.index');
    
    
    Route::get('news/item/create','itemadd')->name('news.item.add');
    Route::post('news/item/create','itemcreate')->name('news.item.create');
    Route::get('news/item/edit','itemedit')->name('news.item.edit');
    Route::post('news/item/edit', 'itemupdate')->name('news.item.update');
    Route::get('news/item/delete', 'itemdelete')->name('news.item.delete');
//    Route::get('news/item/index/{id}','itemindex')->name('news.item.index');
//    Route::get('news/item/show/{id}','itemshow')->name('news.item.show');

    
    Route::get('news/mypage/shopindex','mypageshopindex')->name('news.mypage.shopindex');
    Route::get('news/mypage/itemindex','mypageitemindex')->name('news.mypage.itemindex');
    Route::get('news/mypage/itemshow','mypageitemshow')->name('news.mypage.itemshow');
});


//use App/Http/Controllers/User/NewsController;

//Route::controller(NewsController::class)->prefix('admin')->group(function(){
//    Route::get('news/create','add')
//});
    
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
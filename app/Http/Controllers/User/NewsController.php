<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Item;
use App\Models\Profile;
use Auth;

class NewsController extends Controller
{
        
    public function shopadd(){
        $profile = auth()->id();
        return view('user.news.shop.create',['profile' => $profile]);
    }
    
    public function shopcreate(Request $request){
        $this->validate($request, Shop::$rules);
          
        $shop = new Shop();
        //dd($shop);
        //$shop->profile_idにAuth::id()を格納してidを合わせる
        $shop->profile_id = Auth::id();
        
        //フォーム情報を各カラムに入れる  
        $shop->shop_name = $request->shop_name;
        $shop->tel = $request->tel;
        $shop->address = $request->address;
  
        //$shop->fill($request->all())->save();
        //保存する
        $shop->save();
        return redirect('user/news/mypage/shopindex');
    }      
    
    public function shopindex($id){
        $profile = Profile::find($id);
        $shops = Shop::where('profile_id',$profile->id)->get();
        return view('user.news.shop.index',['profile' =>$profile,'shops'=>$shops]);
    }     
    
    public function shopedit(Request $request){
        $profile = Profile::find(Auth::id());
        $shop = Shop::find($request->id);
        //dd($shop);
        //return view('user.profile.edit')->with(['profile' =>$profile[$id]]);
        return view("user.news.shop.edit", ['shop' => $shop,'profile' =>$profile]);
    }
    
    public function shopupdate(Request $request){
        // Validationをかける
        $this->validate($request, Shop::$rules);
        // Shop Modelからデータを取得する
        $shop = Shop::find($request->id);
          //dd($shop);
          //dd($request->id);
        //$requestの中身全てを$shop_formに格納する  
        $shop_form = $request->all();
        //上記で格納した$shop_formkから_tokenは格納解除
        unset($shop_form['_token']);
        // 該当するデータを上書きして保存する
        $shop->fill($shop_form)->save();

        return redirect('user/news/mypage/shopindex');//
    }
    
    public function shopdelete(Request $request){
        // 該当するShop Modelを取得
        $shop = Shop::find($request->id);
        // 削除する
        $shop->delete();

        return redirect('user/news/mypage/shopindex');
    }
        
    public function shopjump($id){
        //該当するShop Modelを取得
        $shop = Shop::find($id);
        //$shop->urlにredirectする
        return redirect()->away($shop->url);    
        
    }    
     //public function shopindex(Request $request)
    //public  function itemadd(Request $request){   
        //$search_shop = $request->search_shop;
                      //if ($search_shop != '') {
        //if(isset($search_shop)){
                      //$serach_shop = $request->search_shop;
                      // if($search_shop != '') {
                      //$shops = Auth->profile->shop::where('shop_name', $search_shop)->get();
         //   $shops = Shop::where('shop_name',auth()->id())->get();
         //   $shops = Shop::where('shop_name',$request->search_shop)->get();
         //} else {
                      // それ以外はすべてのshopを取得する
         //   $shops = Shop::where('profile_id',auth()->id())->get();
                      //Auth->profile->shop::all();
        //}
                      //$shops = Shop::find($request->id);
        
        //return view('user.news.item.create',['shops' => $shops,'search_shop' => $search_shop]);
    //}
   
    public  function itemadd(){   
         $shops = Shop::where('profile_id',auth()->id())->get();
         return view('user.news.item.create',['shops' => $shops]);
    }
    
    public function itemcreate(Request $request){
         // Validationをかける
         $this->validate($request, Item::$rules);
          
         $item = new item();
         
         $form = $request->all();
         //dd($request);
         //$itemのカラムの内item_image_path以外以外をフォームから取得
         $item->shop_id = $request->shop_id;
         $item->item_name = $request->item_name;
         $item->comment = $request->comment;
         $item->score = $request->score;
          
          
          //$item->fill($request->all())->save();
        //フォームにitem_imageが入っている場合は画像ファイルはpublic/imageに入れ$item->item_image_pathには$path格納
        if (isset($form['item_image'])) {
            $path = $request->file('item_image')->store('public/image');
            $item->item_image_path = basename($path);
        //フォームにitem_imageが入っていない場合は$item->item_image_pathにnullを格納する    
        } else {
            $item->item_image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        //unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        //unset($form['item_image']);

        // データベースに保存する
        //$item->fill($form);
        
        $item->save();
        $shops = Shop::where('profile_id',auth()->id())->get();
        
        return redirect('user/news/item/create');
         //return view('user.news.item.create')->with('message', '品物を新規に作成しました');
    }
    
    public function itemindex($id){
        $shop = Shop::find($id);
        $items = Item::where('shop_id',$shop->id)->get();
         
         //$items = Item::pagenate(3);
         
        return view('user.news.item.index',['shop' => $shop,'items' => $items]);
    }
    
    public function itemedit(Request $request){
        $item = Item::find($request->id);
        $shop = Shop::find($request->shop_id);
        return view('user.news.item.edit',['item' => $item,'shop'=>$shop]);
    }
    
    public function itemupdate(Request $request){
        // Validationをかける
        $this->validate($request, Item::$rules);
        // Item Modelからデータを取得する
        $item = Item::find($request->id);
        // 送信されてきたフォームデータを格納する
        $item_form = $request->all();

        if ($request->remove == 'true') {
            $item_form['item_image_path'] = null;
        } elseif ($request->file('item_image')) {
            $path = $request->file('item_image')->store('public/image');
            $item_form['item_image_path'] = basename($path);
        } else {
            $item_form['item_image_path'] = $item->image_path;
        }

        unset($item_form['item_image']);
        unset($item_form['remove']);
        unset($item_form['_token']);

        // 該当するデータを上書きして保存する
        $item->fill($item_form)->save();

        return redirect('user/news/mypage/shopindex');
        
    }
    
    public function itemdelete(Request $request){
        // 該当するItme Modelを取得
        $item = Item::find($request->id);

        //消去する
        $item->delete();

        return redirect('user/news/mypage/shopindex');
    }
    
    public function itemshow($id){
         $item = Item::find($id);
         return view('user.news.item.show',['item'=>$item]);
    }
    
    
    public function mypageshopindex(){
         //$profile = Profile::find($id);
         //$profile = Profile::where('id',auth()->id())->get();
         $profile =Profile::find(auth()->id());
         $shops = Shop::where('profile_id',auth()->id())->get();
         return view('user.news.mypage.shopindex',['profile' => $profile,'shops' => $shops]);
    }
     
    public function mypageitemindex(Request $request){
         $shop = Shop::find($request->id);
         $items = Item::where('shop_id',$shop->id)->get();
         return view('user.news.mypage.itemindex',['shop' => $shop,'items' => $items]);
         //$profile = Profile::find($id);
         //$profile = Profile::where('id',auth()->id())->get();
    }
    
    public function mypageitemshow(Request $request){
         $item = Item::find($request->id);
         return view('user.news.mypage.itemshow',['item'=>$item]);
    }
     
     
     
     
     
     //public function mypageindex(){
         //$profile = Profile::find($id);
     //    $profile = Profile::where('id',auth()->id())->get();
         //$profile = Profile::find(auth()->id());findは配列ではない。getは配列なので[]でviewに送る必要あり。。
         //return view('user.news.mypage.shopindex',['profile' => $profile[0],'shops' => $shops]);
         //dd($profile);
     //    $shops = Shop::where('profile_id',auth()->id())->get();
           
     //      foreach($shops as $shop){
     //          $shop_items = Item::where('shop_id',$shop->id)->get();
     //          $items[$shop->id] = $shop_items;
     //      }
      //   return view('user.news.mypage.shopindex',['profile' => $profile[0],'shops' => $shops,'items' =>$items]);
     //}
    
}
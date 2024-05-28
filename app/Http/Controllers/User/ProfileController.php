<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Auth;

class ProfileController extends Controller
{
    //
    
    public function add()
    {   
        return view('user.profile.create');
    }
    
    public function create(Request $request)
    {
       //Validationを行う
        $this->Validate($request,Profile::$rules);


        // NOTE: Profile のIDと User のIDを共有する想定で実装する
        $profile = Profile::find(Auth::id());
        if (!$profile) {
            $profile = new Profile;
            //auth()->user()->id; 認証済みのログイン中のユーザーのid
            $profile->id = Auth::id();
        }

        $profile->name = $request->name;
        $profile->gender = $request->gender;
        $profile->hobby = $request->hobby;
        $profile->introduction = $request->introduction;
        $profile->page = $request->page;
        $profile->explain = $request->explain;

        if(isset($request->image)){
           $path = $request->file('image')->store('public/image');
           $profile->image_path = basename($path);        
        } else {
            $profile->image_path = null;
        }

        // データベースに保存する
        // dd($profile, $form,$request);

        $profile->save();
        return redirect('user/profile/create');//->with('message', 'プロフィールを新規作成しました');
    }  
    
    
    
    public function index(Request $request){
        $page_keyword = $request->page_keyword;
        if ($page_keyword != '') {
            $profiles = Profile::where('name','LIKE', "%{$page_keyword}%" )->get();
        }else{
            $profiles = Profile::all();
        }

        $profile = Profile::find(Auth::id());

        //return view('main',compact('profiles'));
        return view('main',['profiles'=>$profiles,'page_keyword'=>$page_keyword, 'has_profile'=>isset($profile)]);
    }
    
    
    
    //public function edit(Request $request)
    //{
        // profile Modelからデータを取得する
    //    $profile = Profile::find($request->id);
    //    if (empty($news)) {
    //        abort(404);
    //    }
    //    return view('user.profile.edit', ['profile_form' => $profile]);
    //}
    
    public function edit()
    {
        $profile = Profile::find(auth()->id());;
        //return view('user.profile.edit')
        //->with(['profile' =>$profile[$id]]);
        return view('user.profile.edit', compact('profile'));
    }
    
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // Profile Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        
          //dd($profile);
          //dd($request->id);
        
        $profile_form = $request->all();
        
        if ($request->remove == 'true') {
            $profile_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $profile_form['image_path'] = basename($path);
        } else {
            $profile_form['image_path'] = $profile->image_path;
        }

        unset($profile_form['image']);
        unset($profile_form['remove']);
        unset($profile_form['_token']);

        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();

        return redirect('user/news/mypage/shopindex');//
    //return back();//->with('message', '投稿を更新しました');

    }
    
    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $profile = profile::find($request->id);

        // 削除する
        $profile->delete();

        return redirect('main');
    }
    
    
}    
        //$news->save();

        //return redirect('admin/news/create');
        //$profile->name = $request->name;
        //$profile->hobby = $request->hobby;
        //$profile->introduction = $request->introduciton;
    
        
        
        // Validationを行う
        //0$this->validate($request, News::$rules);

        //$news = new News;
        //$form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        //if (isset($form['image'])) {
        //    $path = $request->file('image')->store('public/image');
        //    $news->image_path = basename($path);
        //} else {
        //    $news->image_path = null;
        //}

        // フォームから送信されてきた_tokenを削除する
        //unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        //unset($form['image']);

        // データベースに保存する
        //$news->fill($form);
        //$news->save();

        //return redirect('admin/news/create');
    
    //public function page(Request $request)//
    //{
    //   forelse($requset as $profile){
    //   $profile_id = $profile->id;
    //   $profile_name = $profile->name;
          
    //    }
    //    return view('main',['posts' =>$posts,'cond_title' =>$cond_title]);//
       
       
       
       
     //  $profile_id = $request->id;
       //もしcond_titleの中になにもなければ、
      
      
      
      
      
    //   if($cond_title != ''){
       //Profileモデルのtitleカラムに$cond_title（ユーザーの入力した文字）と一致するレコードをすべて取得し、変数postsに入れる
    //       $profile = Profile::where('title,$cond_title')->get();
    //   } else {
           //データベースに保存されるNewsテーブルのレコードを全て取得し、変数postに入れる
    //       $profile = Profile::all();
    //   }
    //return view('main',['posts' =>$posts,'cond_title' =>$cond_title]);
    //}
    


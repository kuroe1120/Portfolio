<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Storage;

class UserController extends Controller
{
    
    /**
     * ユーザー一覧ページの表示
     */
    public function index(Request $request) {
        
        $user = User::findAll();
        $follow_ids = Follow::searchFollowIds(Auth::id());
        
        return view ('tweet.user', ['users' => $user, 'follow_ids' => $follow_ids]);
    }
    
    /**
     * プロフィール編集画面
     */
    public function show() {
        
        $user = User::find(Auth::id());
        
        return view ('tweet.profile', ['user' => $user]);
    }
    
    /**
     * プロフィール編集機能
     */
    public function update(Request $request) {
        
        $user = User::find(Auth::id());
        $user->name = $request->name;
        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('portfolio123123', $image, 'public');
        // アップロードした画像のフルパスを取得
        $user->image_path = Storage::disk('s3')->url($path);
        $user->save();
        
        return redirect('/tweets');
    }
}

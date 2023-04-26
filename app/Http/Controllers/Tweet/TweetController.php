<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    /**
     * ツイート一覧ページの表示
     */
    public function index(Request $request)
    {
        $cond_body = $request->cond_body;
       
        $posts = Tweet::getFollowedPosts(Auth::id());
       
        return view('tweet.index', ['posts' => $posts, 'cond_body' => $cond_body]);
    }
    
    /**
     * ツイート投稿ページの表示
     */
    public function create(Request $request) {
        
        return view('tweet.create');
    }
    
    /**
     * 投稿DBに登録
     */
    public function tweetPost(Request $request) {
        
        $tweet = new Tweet();
        
        $tweet->user_id = Auth::id();
        
        $tweet->body = $request->body;
        
        $tweet->save();
        
        return redirect('/tweet/index');
    }
    
    /**
     * ユーザー一覧ページの表示
     */
    public function user(Request $request) {
        
        $user = User::findAll();
        
        return view ('tweet.user', ['users' => $user]);
    }
    
    /**
     * フォロー機能
     */
    public function follow($id) {
        
        $follow = new Follow;
        
        $follow->user_id = Auth::id();
        
        $follow->follow_id = $id;
        
        $follow->save();
        
        return redirect('/tweet/index');
    }
    
    /**
     * フォロー解除機能
     */
    public function unfollow($id) {
        
        Follow::where([
          ['user_id', '=', Auth::id()],
          ['follow_id', '=', $id],
        ])->delete();
        
        return redirect('/tweet/index');
    }
    
    /**
     * プロフィール編集画面
     */
    public function profile() {
        
        $user = User::find(Auth::id());
        
        return view ('tweet.profile', ['user' => $user]);
    }
    
    /**
     * プロフィール編集機能
     */
    public function update(Request $request) {
        
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->save();
        
        return redirect('/tweet/index');
    }

}

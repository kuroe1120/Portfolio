<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
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
     * 投稿DBに登録
     */
    public function store(Request $request) {
        
        $tweet = new Tweet();
        
        $tweet->user_id = Auth::id();
        
        $tweet->body = $request->body;
        
        $tweet->save();
        
        return redirect('/tweets');
    }
}

<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tweet;
use App\Models\follow;

class TweetController extends Controller
{
    public function index(Request $request)
    {
        $tweet = new tweet;
        
        $cond_body = $request->cond_body;
       if ($cond_body != '') {
         $posts = tweet::where('body','like','%'.$cond_body.'%')->orderBy('created_at','desc')->paginate(10);
       }else {
         $posts = tweet::orderBy('created_at','desc')->paginate(10);
       }
        return view('tweet.index', ['posts' => $posts, 'cond_body' => $cond_body]);
    }
}

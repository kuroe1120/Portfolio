<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tweet;
use App\Models\follow;

class TweetController extends Controller
{
    public function index()
    {
        return view('tweet.index');
    }
}

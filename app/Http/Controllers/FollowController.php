<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    /**
     * フォロー機能
     */
    public function follow($id) {
        
        $follow = new Follow;
        
        $follow->user_id = Auth::id();
        
        $follow->follow_id = $id;
        
        $follow->save();
        
        return redirect('/tweets');
    }
    
    /**
     * フォロー解除機能
     */
    public function unfollow($id) {
        
        Follow::where([
          ['user_id', '=', Auth::id()],
          ['follow_id', '=', $id],
        ])->delete();
        
        return redirect('/tweets');
    }
}

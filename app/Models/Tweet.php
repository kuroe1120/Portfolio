<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tweet extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 'body',
    ];
    
    protected $table = 'tweet';
    
    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'body' => 'required',
    );
    
    public static function getFollowedPosts($id) {
        
        return DB::table('tweet')
            ->distinct()
            ->select('tweet.id', 'tweet.user_id', 'tweet.body', 'tweet.created_at','users.name')
            ->join('users', 'users.id', '=', 'tweet.user_id')
            ->leftJoin('follow', 'follow.follow_id', '=', 'tweet.user_id')
            ->where('follow.user_id', $id)
            ->orWhere('tweet.user_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
    
}

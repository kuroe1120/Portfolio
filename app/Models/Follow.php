<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'follow_id'];

    protected $table = 'follow';
    
    public static function searchFollowIds($user_id) {
        $follow_id = Follow::where('user_id', $user_id)->get(['follow_id']);
        return array_column($follow_id->toArray(), 'follow_id');
    }
}

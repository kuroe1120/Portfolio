<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class follow extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'follow_id' => 'required',
    );
}

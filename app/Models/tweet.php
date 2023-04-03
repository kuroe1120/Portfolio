<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tweet extends Model
{
    use HasFactory;
    
    protected $table = 'tweet';
    
    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'body' => 'required',
    );
    
}

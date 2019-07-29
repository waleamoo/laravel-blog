<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    // displaying the post for a user
    public function user(){
        return $this->belongsTo('App\User');
    }
    
}

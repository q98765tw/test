<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'content',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }
    public function message()
    {
    return $this->hasMany('App\Entities\Message');
    }
}

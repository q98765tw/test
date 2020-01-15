<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'content','created_at','updated_at'
    ];
    public function post()
    {
        return $this->belongsTo('App\Entities\Post');
    }
    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }
}

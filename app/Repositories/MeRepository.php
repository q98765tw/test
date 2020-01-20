<?php

namespace App\Repositories;
use App\Entities\Message;
use App\Entities\Post;

class MeRepository
{
    // public function guard()
    // {

    // }
    public function index(){
        
        return Message::get();
        return view('post.show', ['posts' => $posts]);
    }
    public function create(array $data)
    {
        //  dd(auth()->user()->message());

        return auth()->user()->message()->create($data);
    }

    public function update($id, array $data)
    {
        // $post = Post::find($id);
        // return $post ? $post->update($data) : false;
    }
}
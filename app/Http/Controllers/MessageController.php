<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MeRepository;

class MessageController extends Controller
{
    protected $messages;

    public function __construct(MeRepository $messages)
    {
        $this->messages = $messages;
    }

    public function index()
    {
        $posts = $this->messages->index();
        
        return view('post.show', ['messages' => $posts]);
    }

    public function create()
    {
        return view('post.show');
    }   

    public function store(Request $request)
    {
        
      
        $post = $this->messages->create(request()->only('post_id', 'content'));
        if ($post) {
            return redirect()->route('post.show', $post->post_id);
        }
    
        return back();
    }

    public function update(Request $request, $id)
    {
        // $result = $this->postRepo->update($id, request()->only('user_id', 'content'));

        // if (!$result) {
        // return redirect()->route('post.index');
        // }

        // return redirect()->route('post.show', $id);
    }
}

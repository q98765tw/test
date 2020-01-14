<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $postRepo;

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }
    
    protected function guard()
    {
        // $post = $this->postRepo->auth(name);
        $post = auth()->user()->name;
        dd($post);
        return view('post.show', ['posts' => $posts]);
    }

    public function index()
    {
        $posts = $this->postRepo->index();
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $this->postRepo->create(request()->only('title', 'content'));
    
        if ($post) {
        return redirect()->route('post.show', $post->id);
        }
    
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = $this->postRepo->find($id);
        
        if (!$post) {
            return redirect()->route('post.index');
        }
        
        return view('post.show', ['post' => $post]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $post = $this->postRepo->find($id);

        if (!$post) {
            return redirect()->route('post.index');
        }
    
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->postRepo->update($id, request()->only('title', 'content'));

        if (!$result) {
        return redirect()->route('post.index');
        }

        return redirect()->route('post.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->postRepo->delete($id);
    
        if ($result) {
        return redirect()->route('post.index');
        }
    
        return back();
    }
}

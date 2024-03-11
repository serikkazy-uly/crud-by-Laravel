<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index', ['posts' => $posts]);
        // dd($posts);
    }

    public function create()
    {
        return view('post.create');
    }


    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        // dd($data);
        $post = Post::create($data);
        return redirect()->route('post.index');
    }


    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        // dd($post->title);
        return view('post.show', ['post'=>$post]);
    }
    public function edit(Post $post)
    {
        // dd($post->title);
        return view('post.edit', ['post' => $post]);
    }



    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string', 
            'content' => 'string', 
            'image' => 'string',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        $post = Post::find(1); // withTrashed()->find(1) - восстановление
        $post->delete(); // restore()
        // dd($post->title);
        dd('deleted');
    }


    public function destroy(Post $post){
        $post->delete(); 
        return redirect()->route('post.index');
    }
}

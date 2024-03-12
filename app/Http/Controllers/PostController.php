<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create',  ['categories' => $categories], ['tags' => $tags]);
    }


    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags=$data['tags'];
        unset($data['tags']);
        // dd($tags, $data);
        $post = Post::create($data);
        $post->tags()->attach( $tags);

        return redirect()->route('post.index');
    }


    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        // dd($post->title);
        return view('post.show', ['post' => $post]);
    }
    public function edit(Post $post)
    {
        // dd($post->title);
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', ['post' => $post, 'categories' => $categories,'tags' => $tags]);
    }



    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',

        ]);
        $tags=$data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        $post = Post::find(1); // withTrashed()->find(1) - восстановление
        $post->delete(); // restore()
        // dd($post->title);
        dd('deleted');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}

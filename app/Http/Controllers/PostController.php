<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // $res='fff';
        foreach ($posts as $post) {

            dump($post->title, $post->content);
        }
        // dd('end');
    }

    public function create()
    {


        $postsArr =  [
            [
                'title' => 'Название поста1', // Пример: Заголовок поста
                'content' => 'Текст поста', // Пример: Содержимое поста
                'image' => 'url_изображения', // Пример: Ссылка на изображение
                'likes' => 0, // Изначально количество лайков равно 0   
            ]
        ];

        foreach ($postsArr as $item) {
            // dd($item);
            Post::create($item);
        }
        dd('created');
    }



    public function update()
    {
        $post = Post::find(2);
        // dd($post->title);

        $post->update([
            'title' => 'updated', // Пример: Заголовок поста
            'content' => 'updated', // Пример: Содержимое поста
            'image' => 'updated', // Пример: Ссылка на изображение
            'likes' => 1, // Изначально количество лайков равно 0 
        ]);
        dd('updated');
    }

    public function delete()
    {
        $post=Post::find(1);// withTrashed()->find(1) - восстановление
        $post->delete(); // restore()
        // dd($post->title);
        dd('deleted');
    }
}

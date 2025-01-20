<?php

namespace App\Controllers;

class PostsController extends \PHPFramework\Controller
{
    public function index()
    {
        $posts = [
            [
                "id" => 1,
                "title" => "Post 1",
                "body" => "Body 1"
            ],
            [
                "id" => 2,
                "title" => "Post 2",
                "body" => "Body 2"
            ],
            [
                "id" => 3,
                "title" => "Post 3",
                "body" => "Body 3"
            ]
        ];

        return view('posts', [
            'title' => 'Страница постов',
            'posts' => $posts
        ]);
    }
}

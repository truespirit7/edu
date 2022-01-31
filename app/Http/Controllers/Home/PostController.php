<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{

    public function show(Post $post)
    {
        dd($post);
//        $categories = Category::orderBy('created_at', 'DESC')->get();
//
//        return view('home.post', [
//            'categories' => $categories,
//            'post' => $post,
//        ]);
    }
}

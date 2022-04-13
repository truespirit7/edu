<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{

    public function showPost(Post $post)
    {
     //    dd($post);
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $date = Carbon::parse($post->created_at);
        return view('home.post', [
            'categories' => $categories,
            'post' => $post,
            'date'=>$date
        ]);
    }
}

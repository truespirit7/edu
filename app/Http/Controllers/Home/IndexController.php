<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
public function index()
{
    $categories = Category::orderBy('created_at', 'DESC')->get();
    $posts = Post::paginate(6);
    return view('home.index', [ 'posts'=> $posts, 'categories' => $categories ] );
}
}

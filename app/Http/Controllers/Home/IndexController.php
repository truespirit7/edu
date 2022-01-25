<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
public function index()
{
    $posts = Post::paginate(6);
    return view('home.index', compact('posts'));
}
}

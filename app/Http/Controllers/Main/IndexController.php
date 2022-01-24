<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
public function index()
{
    $posts = Post::paginate(7);
    return view('home.index', compact('posts'));
}
}

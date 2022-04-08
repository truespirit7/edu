<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
public function index($categoryId = 0 )
{
    $categories = Category::orderBy('created_at', 'DESC')->get();
    $posts = Post::latest();
    if($categoryId){
        $posts -> where('category_id', $categoryId);
    }
    return view('home.index', [ 'posts'=> $posts->paginate(6), 'categories' => $categories ] );
}


}

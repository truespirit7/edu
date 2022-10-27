<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class IndexController extends Controller
{
public function index($categoryId )
{
    $tags = Tag::orderBy('created_at', 'DESC')->get();
    $categories = Category::orderBy('created_at', 'DESC')->get();

    $posts = Post::latest();
    if($categoryId){
        $posts = $posts -> where('category_id', $categoryId);
    }
    return view('home.index', [ 'posts'=> $posts->paginate(6), 'categories' => $categories , 'tags' => $tags ] );
}
    public function indexByTag($tagId = 0 )
    {
        $tags = Tag::orderBy('created_at', 'DESC')->get();
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $postTags = PostTag::orderBy('created_at', 'DESC')->get();
        $posts = Post::latest();
        if($tagId){
            $postTags = $postTags -> where('tag_id', $tagId)->pluck('post_id');
            $posts -> where('id', $postTags);
        }
        return view('home.index', [ 'posts'=> $posts->paginate(6) , 'categories' => $categories, 'tags' => $tags ] );

    }

    public function indexByCat($categoryId = 0 )
    {
        $tags = Tag::orderBy('created_at', 'DESC')->get();
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $postTags = PostTag::orderBy('created_at', 'DESC')->get();
        $posts = Post::latest();
        if($categoryId){
            $posts = $posts -> where('category_id', $categoryId);

        }
        return view('home.index', [ 'posts'=> $posts->paginate(6) , 'categories' => $categories, 'tags' => $tags ] );

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function search( Request $request){
    $query = $request->input('query');
    $posts = Post::where('title', 'like', '%'.$query.'%')->get();
    return response()->json($posts);
    }




}

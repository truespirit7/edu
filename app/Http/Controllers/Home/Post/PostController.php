<?php

namespace App\Http\Controllers\Home\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\PostTag;
use App\Models\Tag;
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
        $postTags = PostTag::orderBy('created_at', 'DESC')->get();
        $comments = Comment::where('post_id', '=', $post->id )-> orderBy('created_at', 'DESC')->get();

        $tags = Tag::orderBy('created_at', 'DESC')->get();
        $date = Carbon::parse($post->created_at);
        $postsByCategory = Post::where('category_id', '=', $post['category_id']);

        return view('home.post', [
            'categories' => $categories,
            'postTags' => $postTags,
            'tags' => $tags,
            'post' => $post,
            'comments'=>$comments,
            'postsByCategory'=>$postsByCategory->paginate(2),
            'date'=>$date
        ]);
    }


}

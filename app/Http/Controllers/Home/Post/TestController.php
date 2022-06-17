<?php

namespace App\Http\Controllers\Home\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\PostTag;
use App\Models\Tag;
use App\Models\TestQuestion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

use App\Models\Test;


class TestController extends Controller
{

    public function showTest(Test $test)
    {
     //    dd($post);
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $postTags = PostTag::orderBy('created_at', 'DESC')->get();
        $questions = TestQuestion::where('test_id','=', $test->id)->get();

        $tags = Tag::orderBy('created_at', 'DESC')->get();
//        $date = Carbon::parse($post->created_at);
//        $postsByCategory = Post::where('category_id', '=', $post['category_id']);

        return view('home.test', [
            'categories' => $categories,
            'postTags' => $postTags,
            'tags' => $tags,
            'test' => $test,
            'questions'=>$questions
//            'comments'=>$comments,
//            'postsByCategory'=>$postsByCategory->paginate(2),
//            'date'=>$date
        ]);
    }


}

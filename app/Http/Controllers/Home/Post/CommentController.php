<?php

namespace App\Http\Controllers\Home\Post;

use App\Http\Controllers\Controller;
use App\Models\PostTag;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;


class CommentController extends Controller
{

    public function storeComment(Post $post, Request $request){
//        dd($request);


        $data['post_id'] = $post->id;
        $data['name'] = $request->name;
        $data['message'] = $request->message;

        Comment::create($data);

        return redirect()->route('article', $post);
    }


}

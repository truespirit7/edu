<?php

namespace App\Http\Controllers\Home\Chatbot;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\PostTag;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class ChatbotController extends Controller
{

    public function openChatbot()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $postTags = PostTag::orderBy('created_at', 'DESC')->get();
        $tags = Tag::orderBy('created_at', 'DESC')->get();


        return view('home.chatbot', ['categories' => $categories,
                'postTags' => $postTags,
                'tags' => $tags,
               ]
        );
    }


}

<?php

namespace App\Http\Controllers\Home\Chatbot;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Comment;
use App\Models\PostTag;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Message;
use App\Events\MessageSent;
class ChatbotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function openChatbot()
    {

//        MessageSent::dispatch("get my message?");

        $categories = Category::orderBy('created_at', 'DESC')->get();
        $postTags = PostTag::orderBy('created_at', 'DESC')->get();
        $tags = Tag::orderBy('created_at', 'DESC')->get();


        return view('home.chatbot', ['categories' => $categories,
                'postTags' => $postTags,
                'tags' => $tags,
            ]
        );

    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);
        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }


    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }
}

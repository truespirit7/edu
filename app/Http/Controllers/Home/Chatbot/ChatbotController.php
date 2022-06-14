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
                $data = (object) [
            "context" => $request->input('message'),
//            "context" => $request->input('message'),
            "length"=> 30,
            "k"=> 0,
            "p"=> 0.9,
            "temperature"=> 1.0 ,
            "rp"=> 1.0,
            "nrs"=> 1,
            "seed"=> 42
        ];
        $url = 'https://6f39-109-174-114-196.eu.ngrok.io';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            'Content-Type: application/json',
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec ($curl);
        $err = curl_error($curl);  //if you need
        curl_close ($curl);
        $socrat = User::where('name', '=', 'Сократ')->get();
        $user = $socrat[0];
        $message = $user->messages()->create([
            'message' => $response
        ]);
        broadcast(new MessageSent($user, $message))->toOthers();

    }
    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
//    public function sendSms($request)
//    {
//        $user = Auth::user();
//        $message = $user->messages()->create([
//            'message' => $request->input('message')
//        ]);
//        $data = (object) [
//            "context" => "Привет, ",
////            "context" => $request->input('message'),
//            "length"=> 30,
//            "k"=> 0,
//            "p"=> 0.9,
//            "temperature"=> 1.0 ,
//            "rp"=> 1.0,
//            "nrs"=> 1,
//            "seed"=> 42
//        ];
//        $url = 'http://localhost:8000';
//
//        $curl = curl_init();
//        curl_setopt($curl, CURLOPT_URL, $url);
//        curl_setopt($curl, CURLOPT_POST, true);
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//
//        $headers = array(
//            'Content-Type: application/json',
//        );
//        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
//
//        $response = curl_exec ($curl);
//        $err = curl_error($curl);  //if you need
//        curl_close ($curl);
//        echo $response;
//    }


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

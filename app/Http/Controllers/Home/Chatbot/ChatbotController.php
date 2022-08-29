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
        $messages = Message::latest()->limit(5)->get();

        return view('home.chatbot', ['categories' => $categories,
                'postTags' => $postTags,
                'tags' => $tags,
            'messages'=>$messages
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

        $url = 'http://10.8.0.5:8020/dialog';
     
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            'Content-Type: application/json',
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $messages = Message::latest()->limit(15)->get()->toArray();

        usort($messages, function($a, $b)
        {
            return strcmp($a['id'], $b['id']);
        });

        $messages = array_map(function ($message) {
            return (object) [
                'speaker' => $message['user_id'] == 2 ? 1 : 0,
                'text' => $message['message'],
            ];
        }, $messages);

        array_push($messages, (object) [
            'speaker' => 0,
            'text' => $request->input('message'),
        ]);

        $data = '{
            "dialog_history_array": ' . json_encode($messages) . ',
            "params": {
                "length": 1,
                "max_length": 256,
                "no_repeat_ngram_size": 3,
                "top_k": 75,
                "top_p": 0.9,
                "temperature": 0.6,
                "num_return": 3,
                "do_sample": true,
                "use_gpu": false
            }
        }';

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $result = curl_exec($curl);

        file_put_contents("C:\\laragon\\www\\edu\\app\\Http\\Controllers\\Home\\Chatbot\\umitest", print_r([__FILE__.' '.__LINE__, $data], true).PHP_EOL, FILE_APPEND | LOCK_EX);

        curl_close($curl);

        $obj = json_decode($result);

        $socrat = User::where('name', '=', 'Сократ')->get();
        $user = $socrat[0];
        $message = $user->messages()->create([
            'message' => $obj->response,//outputs[0],
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

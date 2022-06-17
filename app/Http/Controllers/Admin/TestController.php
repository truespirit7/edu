<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Test;
use App\Models\TestAnswer;
use App\Models\TestQuestion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rulesTitle = ['required', 'string', 'unique:posts', 'max:150'];
    protected $rulesContent = ['required', 'string', 'unique:posts'];
    protected $rulesExcerpt = ['required', 'string', 'unique:posts', 'max:150'];
    protected $rulesImage = ['nullable','image', 'mimes:jpeg,jpg,png,gif'];

    protected $rulesUpdateTitle = ['required', 'string', 'max:300'];
    protected $rulesUpdateContent = ['required', 'string'];



    public function index()
    {
        $tags = Tag::orderBy('created_at', 'desc')->get();
        return(view('admin.test.index', ['tags'=>$tags]));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @param  \App\Models\Test  $test

     */
    public function create()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return(view('admin.test.create', ['posts' => $posts]));
    }

    /**
     * Store a newly created resource in storage.
     *
     *

//     * @param  \App\Models\Test  $test
//     * @param  \App\Models\TestQuestion  $question
//     * @param  \App\Models\TestAnswer  $answer
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response


     */
    public function store(Request $request)
    {
//        $validation = $request->validate(['title'=>$this->rulesTitle, 'content'=>$this->rulesContent, 'excerpt'=>$this-> rulesExcerpt, 'preview_img'=>$this->rulesImage]);
        $newTest = new Test();
        $newTest->title= $request->title;
        $newTest->post_id = $request->post_id;
        $newTest->save();

        $newQuestion = new TestQuestion();
        $newQuestion->test_id= $newTest->id;
        $newQuestion->question_text= $request->question_text1;
        $newQuestion->question_explanation = $request->explanation1;
        $newQuestion->answer_true = $request->answer1_question1;
        $newQuestion->answer_false = $request->answer2_question1;
        $newQuestion->save();

        $newQuestion = new TestQuestion();
        $newQuestion->test_id= $newTest->id;
        $newQuestion->question_text= $request->question_text2;
        $newQuestion->question_explanation = $request->explanation2;
        $newQuestion->answer_true = $request->answer1_question2;
        $newQuestion->answer_false = $request->answer2_question2;
        $newQuestion->save();

//        $newQuestion = new TestQuestion();
//        $newQuestion->test_id= $newTest->id;
//        $newQuestion->question_text= $request->question_text1;
//        $newQuestion->question_explanation = $request->explanation1;
//        $newQuestion->answer_true = $request->answer1_question1;
//        $newQuestion->answer_false = $request->answer2_question1;
//        $newQuestion->save();
//
//        $newQuestion = new TestQuestion();
//        $newQuestion->test_id= $newTest->id;
//        $newQuestion->question_text= $request->question_text1;
//        $newQuestion->question_explanation = $request->explanation1;
//        $newQuestion->answer_true = $request->answer1_question1;
//        $newQuestion->answer_false = $request->answer2_question1;
//        $newQuestion->save();
//
//        $newQuestion = new TestQuestion();
//        $newQuestion->test_id= $newTest->id;
//        $newQuestion->question_text= $request->question_text5;
//        $newQuestion->question_explanation = $request->explanation5;
//        $newQuestion->answer_true = $request->answer1_question5;
//        $newQuestion->answer_false = $request->answer2_question5;
//        $newQuestion->save();



        return redirect()->back()->withSuccess('Статья была успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test  $test)
    {
        $tags = Tag::orderBy('created_at', 'DESC')->get();
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('home.post', [
            'categories' => $categories,
            'tags' => $tags,
            'test' => $test,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.post.edit', [
            'categories' => $categories,
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validation = $request->validate(['title'=>$this->rulesUpdateTitle, 'content'=>$this->rulesUpdateContent, 'preview_img'=>$this->rulesImage]);
        $post->title= $request->title;
        $post->content= $request->content;
        $post->excerpt= $request->excerpt;
        $previewImg = $request->preview_img;
        if($previewImg) {
            $previewImgPath = Storage::put('/public/images', $previewImg);
            $previewImgPath = substr($previewImgPath, 6);
            $post->preview_img = $previewImgPath;
        }
        $post -> category_id = $request->cat_id;
        $post->update();

        return redirect()->back()->withSuccess('Статья была успешно обновлена!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->withSuccess('Статья была успешно удалена!');
    }
}

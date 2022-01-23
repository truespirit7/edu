<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rulesTitle = ['required', 'string', 'unique:posts', 'max:300'];
    protected $rulesContent = ['required', 'string', 'unique:posts'];
    protected $rulesImage = ['nullable','image', 'mimes:jpeg,jpg,png,gif'];

    protected $rulesUpdateTitle = ['required', 'string', 'max:300'];
    protected $rulesUpdateContent = ['required', 'string'];



    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return(view('admin.post.index', ['posts'=>$posts]));
        //return(dd ( ['posts'=>$posts]));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return(view('admin.post.create', ['categories'=>$categories]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate(['title'=>$this->rulesTitle, 'content'=>$this->rulesContent, 'preview_img'=>$this->rulesImage]);
        $newPost = new Post();
        $newPost->title= $request->title;
        $newPost->content= $request->content;
        $previewImg = $request->preview_img;
        $previewImgPath = Storage::put('/public/images', $previewImg);
        $previewImgPath = substr($previewImgPath, 6);
        $newPost->preview_img = $previewImgPath;

        $newPost -> category_id = $request->cat_id;
        $newPost->save();
//        $data= $request->all();
//        dd($data);
         return redirect()->back()->withSuccess('Статья была успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
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
        $previewImg = $request->preview_img;
        if($previewImg) {
            $previewImgPath = Storage::put('/public/images', $previewImg);
            $previewImgPath = substr($previ ewImgPath, 6);
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
        //
    }
}

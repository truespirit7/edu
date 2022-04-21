<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rulesTag = ['required', 'string', 'unique:categories', 'max:100'];

    public function index()
    {
        $tags = Tag::orderBy('created_at', 'desc')->get();
        return(view('admin.tag.index', ['tags'=>$tags]));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return(view('admin.tag.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate(['title'=>$this->rulesTag]);
        $newTag = new Tag();
        $newTag->title= $request->title;
        $newTag->save();

        return redirect()->back()->with('message','Тег был успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return(view('admin.category.edit', ['category'=>$category]));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $validation = $request->validate(['title'=>$this->rulesCategory]);
        $category -> title = $request->title;
        $category->save();

        return redirect()->back()->withSuccess('Категория была успешно изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->withSuccess('Категория была успешно удалена!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = ['Home_key'=>'Home_value'];
        # dd($data); // dump and die
        // $data = Post::all(); // call data
        $data = Post::orderBy('id', 'desc')->get();
         return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|unique:posts|max:255',
        //     'description' => 'required:posts|max:255',
        // ]);
        // $post = new Post();
        // $post->name = $request->name;
        // $post->description = $request->description;
        // $post->save();
        Post::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) #($id) Route model binding
    {
        // $post = Post::findOrFail($id);
        dd($post->categories->category_name);
        return view('more', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $post = Post::findOrFail($id);
        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post) #($id)
    {
        // $validated = $request->validate([
        //     'name' => 'required|unique:posts|max:255',
        //     'description' => 'required:posts|max:255',
        // ]);
        // $post = Post::findOrFail($id);
        // $post->name = $request->name;
        // $post->description = $request->description;
        // $post->save();
        $post->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) #($id)
    {
        // $post = Post::findOrFail($id)->delete();
        $post->delete();
        return redirect('/posts');
    }
}

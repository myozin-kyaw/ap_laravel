<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data = Post::where('user_id', auth()->id())->orderBy('id', 'desc')->get();
         return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // $post = new Post();
        // $post->name = $request->name;
        // $post->description = $request->description;
        // $post->save();

        // week 4
        // Post::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'category_id' => $request->category_id
        // ]);
        // week 5
        $validated = $request->validated();
        Post::create($validated + ['user_id'=>Auth::user()->id]);
        // return redirect('/posts')->with('status', 'Post was successfully created!');
        return redirect('/posts')->with('status', config('alert.alert_message.created'));
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
        // dd($post->categories->category_name);
        // week5.2
        // if($post->user_id != auth()->id()) {
        //     abort(403);
        // }
        $this->authorize('view', $post);
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
        $category = Category::all();
        // if($post->user_id != auth()->id()) {
        //     abort(403);
        // }
        $this->authorize('view', $post);
        return view('edit', compact('post','category'));
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
        // $validated = $request->validated([
        //     'name' => 'required|unique:posts|max:255',
        //     'description' => 'required:posts|max:255',
        // ]);
        // $post = Post::findOrFail($id);
        // $post->name = $request->name;
        // $post->description = $request->description;
        // $post->save();
        // $post->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'category_id' => $request->category_id
        // ]);
        $validated = $request->validated();
        $post->update($validated + ['user_id'=>Auth::user()->id]);
        // return redirect('/posts')->with('status', 'Post was successfully updated!');
        return redirect('/posts')->with('status', config('alert.alert_message.updated'));
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
        // return redirect('/posts')->with('delete', 'Post was successfully deleted!');
        return redirect('/posts')->with('delete', config('alert.alert_message.deleted'));
    }
}

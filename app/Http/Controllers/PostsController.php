<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // returns the index
        //$posts = Post::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // creates a post
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the form data 
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        // if the validation passess - insert the data into the database using Tinker
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // shows the blog post detail 
        $post =  Post::find($id);
        return view('post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =  Post::find($id);
        // check for the correct user 
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorised page');
        }

        return view('post.edit')->with('post', $post);
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the form data 
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        // if the validation passess - insert the data into the database using Tinker
        //$post = new Post();
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/posts')->with('success', 'Post Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // check for the correct user 
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorised page');
        }
        
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}

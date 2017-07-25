<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the blog posts from the DB
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        // return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);


        // validate data
        $this->validate($request, [
            'title' => 'required|unique:posts|max:255',
            'slug' => 'required|alpha_dash|unique:posts|min:5|max:255, slug',
            'body' => 'required'
        ]);

        // store in DB
        $post = new Post;
        $post->title = ucfirst($request->title);
        $post->slug = $request->slug;
        $post->body = ucfirst($request->body);

        $post->save();


        Session::flash('success_form', 'The blog post was successfully saved');


        // redirect to another page
        return redirect()->route('blog.single', $post->slug);





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', [
            'post' => $post

        ]);
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
        // validate data
        $post = Post::find($id);

        $validateTitle = $request->title != $post->title ? '|unique:posts' : null;
        $validateSlug = $request->slug != $post->slug ? '|unique:posts' : null;
        $this->validate($request, [
            'title' => 'required'.$validateTitle.'|max:255',
            'slug' => 'required|alpha_dash'.$validateSlug.'|min:5|max:255, slug',
            'body' => 'required'
        ]);

        // Save
        $post = Post::find($id);

        $post->title = ucfirst($request->title);
        $post->slug = $request->slug;
        $post->body = ucfirst($request->body);

        $post->save();

        // Redirect with flash message

        Session::flash('success_form', 'This post was successfully saved');

        return redirect()->route('blog.single', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        Session::flash('success_form', 'Post has been successfully deleted');

        return redirect()->route('posts.index');
    }
}

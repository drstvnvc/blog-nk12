<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // $posts = Post::orderBy('id', 'desc')->where('is_published',1)->get();
    $posts = Post::with('comments')
      ->where('is_published', 1)
      ->orderBy('id', 'desc')
      ->get();

    // select content from posts
    //  where is_published=1;
    // return view('posts', [
    //   'posts' => $posts,
    // ]);
    return view('posts.index', compact('posts'));
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
   * @param  App\Http\Requests\CreatePostRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreatePostRequest $request)
  {
    // $post = new Post;
    // $post->title = $request->title;
    // $post->content = $request->content;
    // $post->is_published = $request->get('is_published', false);
    // $post->save();
    $data = $request->validated();
    auth()->user()->posts()->create($data);
    return redirect('/');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function show(Post $post)
  {
    // $post = Post::findOrFail($id); // where('id', $id)->first()
    // select * from users where email = $email;
    // User::find('email', $email)
    // User::where('email', $email)->first(); {} | null
    return view('posts.show', compact('post'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function edit(Post $post)
  {
    //
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
    //
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

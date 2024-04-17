<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function dashboard()
  {
    $posts = Post::latest()->paginate(5);
    return view('dashboard', compact('posts'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|max:255',
      'body' => 'required',
    ]);
    
      $posts = new Post;
      $posts->title = $request->title;
      $posts->body = $request->body;
      $posts->user_id = Auth::id();
      $posts->save();
      $categories = $request->category;
    
      $posts->categories()->attach($categories);
     
      return redirect()->route('dashboard')
        ->with('success', 'Post created successfully.');
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
    $request->validate([
      'title' => 'required|max:255',
      'body' => 'required',
    ]);
    $post = Post::find($id);
    $post->update($request->all());

    $categories = $request->category;
      $post->categories()->sync($categories);
    
    return redirect()->route('dashboard')
      ->with('success', 'Post updated successfully.');
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
    $post->categories()->detach();
    $post->delete();
    return redirect()->route('dashboard')
      ->with('success', 'Post deleted successfully');
  }
  // routes functions
  /**
   * Show the form for creating a new post.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();
    return view('posts.create', [
      'categories' => $categories,
    ]);
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
    return view('posts.show', compact('post'));
  }
  /**
   * Show the form for editing the specified post.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $post = Post::find($id);
    $categories = Category::all();
    return view('posts.edit', compact('post'),[
      'posts'=> $post,
      'categories' => $categories,
    ]);
  }
}

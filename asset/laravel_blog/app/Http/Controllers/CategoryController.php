<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function category()
  {
    $categories = Category::all();
    return view('categories.category', compact('categories'));
  }


  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|max:255',
    ]);
      $categories = new Category;
      $categories->name = $request->name;
      $categories->save();
      
      return redirect()->route('category')
        ->with('success', 'Categorie created successfully.');
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function categoryupdate(Request $request, $id)
  {

    $request->validate([
      'name' => 'required|max:255',
    ]);
    $categories = Category::find($id);
    $categories->update($request->all());
    return redirect()->route('category')
      ->with('success', 'categories updated successfully.');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function categorydestroy($id)
  {
    $categories = Category::find($id);
    $categories->posts()->detach();
    $categories->delete();
    return redirect()->route('category')
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

    return view('categories.category');
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $categories = Categorie::find($id);
    return view('category', compact('categories'));
  }
  /**
   * Show the form for editing the specified post.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function categoryedit($id)
  {
    $categories = Category::find($id);
    return view('categories.editcategorie', compact('categories'));
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Post;
use App\Models\Category;


class WelcomeController extends Controller{  

    public function welcome() {    
        $post = Post::latest()->paginate(5);
        $categories = Category::all();
        return view('welcome', [
            'posts'=> $post,
            'categories' => $categories,
        ]);
    }
    public function welcomecategory($id) {

        $post= Post::whereHas('categories',function($query) use($id){
            $query->where('category_id', $id);
        })->latest()->paginate(5);
        $categories = Category::all();
        return view('welcome', [
            'posts'=> $post,
            'categories' => $categories,
        ]);
    }
}

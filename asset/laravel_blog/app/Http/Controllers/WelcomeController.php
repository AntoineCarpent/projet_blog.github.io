<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Post;


class WelcomeController extends Controller{   
    public function welcome() {    
        $post = Post::latest()->get();
        return view('welcome', [
            'posts'=> $post,
        ]);
    }
}

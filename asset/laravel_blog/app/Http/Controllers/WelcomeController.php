<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;


class WelcomeController extends Controller{   
    public function welcome() {    
        $post = Post::all();
        return view('welcome', [
            'post'=> $post,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function user() {    
        $user = User::all();
        return view('users.user', [
            'user'=> $user,
        ]);
    }

    public function show($id)
    {
      $user = User::find($id);
      return view('users.edituser', compact('user'));
    }

    public function update(Request $request, $id)
  {
    $request->validate([
    ]);
    $user = User::find($id);
    $user->role = $request->role;
    $user->save();
    return redirect()->route('user')
      ->with('success', 'Post updated successfully.');
  }

    public function destroy($id)
  {
    $user = User::find($id);
    foreach($user->posts as $post) {
      $post->delete();
    }
    $user->delete();
    return redirect()->route('user')
      ->with('success', 'Post deleted successfully');
  }
    
}

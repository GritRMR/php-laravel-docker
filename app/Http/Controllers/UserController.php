<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
class UserController extends Controller
{
  public function showDataInHome(){
    $post=Post::all();
    return view('home',compact('post'));
  }
public function showFullPost($id){
  $post=Post::findOrFail($id);
  return view('fullpost',compact('post'));

}
  public function index() {
    return view('admin.dashboard');
}

public function userDashboard() {
    return view('dashboard');
}

public function userAddPost()
{
    return view('user.addpost');
}

public function storeUserPost(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $image = $request->image;
    $imagename = time() . '.' . $image->getClientOriginalExtension();
    
    $post = Post::create([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $imagename,
        'user_name' => Auth::user()->name,
        'user_id' => Auth::user()->id,
        'status' => 'pending' // Default: pending approval
    ]);

    $request->image->move('img', $imagename);
    
    return redirect()->route('dashboard')->with('status', 'Post submitted for admin approval!');
}

public function blog()
{
    $posts = Post::where('status', 'approved')
                ->latest()
                ->paginate(12); // 12 posts per page
    return view('blog', compact('posts'));
}

}


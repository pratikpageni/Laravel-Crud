<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected  $post;
    public function __construct()
    {
        $this->post = new Post();
    }
    function index(){
        // dd(auth()->user()->id);
        $posts = $this->post::where('user_id', Auth::id())->get();
        return view('posts.index', compact('posts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $base_route = 'posts';
    protected $title = 'Posts';
    protected  $post;
    public function __construct()
    {
        $this->post = new Post();
    }

    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();

        return view('post.index',compact('posts') );
    }

   
    public function create()
    {
        return view('post.create',);
    }

    
    public function store(PostRequest $request)
    {
        try{
            DB::beginTransaction();
            $validatedData=$request->validated();
            $validatedData['user_id'] = auth()->id();
            $this->post::create($validatedData);
            DB::commit();
            return redirect()->route('posts.index')->with('success', 'Post saved successfully!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('posts.index')->with('error',$ex->getMessage());

        }
    }

     public function show($id)
    {
        //
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));

    }

   
    public function update(PostRequest $request, Post $post)
    {
        
        try {
            DB::beginTransaction();
            $validatedData = $request->validated();
            $post->update($validatedData);
            DB::commit();
            return redirect()->route('posts.index')->with('success', 'Product update successfully!');
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->route('posts.index')->with('error', $ex->getMessage());
        }
    }

    
    public function destroy(Post $post)
    {
        try {
            DB::beginTransaction();
            $post->delete();
            DB::commit();
            return redirect()->route('posts.index')->with('success', 'Product deleted successfully.');
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->route('posts.index')->with('error', $ex->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function index(){
        //$posts = Post::all();
        $posts = Post::paginate(5);
        $data = [
            'posts' => $posts
        ];
        return view('index', $data);
    }

    public function login(){
        return view('login');
    }

    public function create(){
        
       if(!auth()->check()){
           return redirect('/login');
       }

        $categories = Category::all();
        $data = [
            'categories' => $categories
        ];
        return view('create', $data);
    }

    public function store(){
        $rules = [
            'detail' => 'required|min:3',
        ];

        // 5.4
        $this->validate(request(), $rules);

        // 5.7 - 5.8 
        // request()->validate($rules);

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->category_id = request()->category_id;
        $post->complete = 0;
        $post->detail = request()->detail;
        $post->save();
        return redirect('/');
    }


    public function edit($id){
        $post = Post::find($id);
        $categories = Category::all();
        $data = [
            'post' => $post,
            'categories' => $categories
        ];
        return view('edit', $data);
    }

    public function update($id){
        $rules = [
            'detail' => 'required|min:3',
        ];

        // 5.4
        $this->validate(request(), $rules);
        $post = Post::find($id);
        $post->user_id = auth()->user()->id;
        $post->category_id = request()->category_id;
        $post->complete = request()->complete;
        $post->detail = request()->detail;
        $post->save();
        return redirect('/');
    }

    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postCon extends Controller
{
    public function index(){
        return view('post.addpost');
    }

    public function savePost(Request $req){
        $req->validate([
            'body'=>'required',
            'image'=>'required'
        ]);
        $imagePath = request('image')->store('uploads','public');
        $req->user()->posts()->create([
            'body'=>$req->body,
            'image'=>$imagePath,
        ]);
        return redirect('/');
    }

    
}

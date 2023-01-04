<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class postCon extends Controller
{
    public function index(){
        return view('post.addpost');
    }

    public function savePost(Request $req){
        $req->validate([
            'body'=>'',
            'image'=>'required'
        ]);
        $images = $req->file('image');
        foreach ($images as $key => $image) {
            $imagePath =  $image->store('uploads','public');
            $req->user()->posts()->create([
                'body'=>$req->body,
                'image'=>$imagePath,
            ]);
        }
        // $imagePath = request('image')->store('uploads','public');
        // $req->user()->posts()->create([
        //     'body'=>$req->body,
        //     'image'=>$imagePath,
        // ]);
        return redirect('/');
    }

    public function storeOnlyPost(Request $req){
        $req->user()->posts()->create([
            'body'=>$req->body,
        ]);
        return redirect('/');
    }

    public function postDelete(Post $post,Request $req){
        $req->user()->posts()->where('id',$post->id)->delete();
        return back();
    }

    
}

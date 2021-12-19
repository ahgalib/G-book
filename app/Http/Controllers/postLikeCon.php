<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class postLikeCon extends Controller
{
    public function postlike(Post $post,Request $req){
        $post->likes()->create([
            'user_id'=>$req->user()->id,
        ]);
        return back();
    }

    public function postlikeDelete(Post $post,Request $req){
        $req->user()->likes()->where('post_id',$post->id)->delete();
        return back();
    }
   
}

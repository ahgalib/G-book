<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\PostComment;

class commentCon extends Controller
{
    public function comment(Post $post,Request $req){
        $req->validate([
            'comment'=>'required',
        ]);
        $post->PostComment()->create([
            'user_id'=>$req->user()->id,
            'comment'=>$req->comment,
        ]);
        return back();
    }

    public function viewCommentPost(Post $post){
        //$comment = PostComment::find($post);
        //$comment = PostComment::find($post);
        //return view('post.comment',['comments'=>$comment]);
        return view('post.comment',compact('post'));
    }

     


    
}

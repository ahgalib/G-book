<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
class postLikeCon extends Controller
{
    // public function postlike(Post $post,Request $req){
    //     $post->likes()->create([
    //         'user_id'=>$req->user()->id,
    //     ]);
    //     return back();
    // }

    // ajax post like
    public function postlike(Request $req){
        $post = Post::all();
        $data =  $req->all();
        //echo"<pre>";print_r($data);die;
        Like::create([
            'user_id'=>$data['userId'],
            'post_id'=>$data['postId'],

        ]);
        return view('profile.version-update.ajaxLike',compact('post'));
    }


    public function postlikeDelete(Post $post,Request $req){
        $req->user()->likes()->where('post_id',$post->id)->delete();
        return back();
    }

}

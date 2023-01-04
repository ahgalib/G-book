<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
use auth;
class FollowerCon extends Controller
{
    public function followers($id){
        Follower::create([
            'user_id'=>auth::id(),
            'profile_id'=>$id,
        ]);
        return back();
    }

    public function following($id){
        Follower::where('user_id',$id)->delete();
        return back();
    }
}

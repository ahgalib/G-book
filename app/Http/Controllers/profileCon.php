<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class profileCon extends Controller
{
    public function index(){
        return view('profile.createProfile');
    }
    public function show(User $user){
        $posts = User::all();
        //$posts = $user->posts()->paginate(8);
        return view('profile.showProfile',['user'=>$user,'posts'=>$posts]);
    }

    public function saveCreateProfile(User $user,Request $req){
       
        $imagePath = request('profile_picture')->store('uploads','public');
        $req->user()->profile()->create([
            'bio'=>$req->bio,
            'url'=>$req->url,
            'profile_picture_caption'=>$req->profile_picture_caption,
            'profile_picture'=>$imagePath,
        ]);
        return redirect("/profilepage/{$user->id}");
    }
}

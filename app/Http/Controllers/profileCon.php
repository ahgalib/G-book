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
        //$posts = User::all();
        //$profile = User::all();
        $posts = $user->posts()->paginate(8);
        return view('profile.showProfile',['user'=>$user,'posts'=>$posts]);
    }

    public function saveCreateProfile(Request $req){
       
        $imagePath = request('profile_picture')->store('uploads','public');
        $req->user()->profile()->create([
            'bio'=>$req->bio,
            'url'=>$req->url,
            'profile_picture_caption'=>$req->profile_picture_caption,
            'profile_picture'=>$imagePath,
        ]);
        return redirect("/profilepage/{$req->user()->id}");
    }

    public function editProfile(User $user){
        $this->authorize('update',$user->profile);
        return view('profile.editprofile',compact('user'));
    }

    public function saveEditProfile(User $user,Request $req){
        $data = request()->validate([
            'bio'=>'required',
            'url'=>'required',
            'profile_picture'=>'',
        ]);
        if(request('profile_picture')){
            $imagePath = request('profile_picture')->store('uploads','public');
            $imageArray = ['profile_picture'=>$imagePath];
        }
        $user->profile()->update(array_merge(
            $data,
            $imageArray??[],
        ));
        return redirect("/profilepage/{$user->id}");
    }


    
}

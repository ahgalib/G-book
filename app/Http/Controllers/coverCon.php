<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class coverCon extends Controller
{
    public function index(){
        return view('profile.addCoverPhoto');
    }

    public function saveCreateCoverPhoto(User $user,Request $req){
        $req->validate([
            'cover_photo_caption'=>'required',
            'cover_photo'=>'required',
        ]);
        $coverPicPath = request('cover_photo')->store('uploads','public');
        $req->user()->coverPicture()->create([
            'cover_photo_caption'=>$req->cover_photo_caption,
            'cover_photo'=>$coverPicPath,
        ]);
        return redirect("/profilepage/{$user->id}");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class coverCon extends Controller
{
    public function index(){
        return view('profile.addCoverPhoto');
    }

    public function saveCreateCoverPhoto(Request $req){
        $req->validate([
            'cover_photo_caption'=>'required',
            'cover_photo'=>'required',
        ]);
        $coverPicPath = request('cover_photo')->store('uploads','public');
        $req->user()->coverPicture()->create([
            'cover_photo_caption'=>$req->cover_photo_caption,
            'cover_photo'=>$coverPicPath,
        ]);
        return redirect("/profilepage/{$req->user()->id}");
    }

    public function editCoverPhoto(User $user){
        return view('profile.editcoverphoto',compact('user'));
    }

    public function saveEditCoverPhoto(User $user){
        $data = request()->validate([
            'cover_photo_caption'=>'required',
            'cover_photo'=>'',
        ]);
        if(request('cover_photo')){
            $imagePath = request('cover_photo')->store('uploads','public');
            $imageArray = ['cover_photo'=>$imagePath];
        }
        auth()->user()->CoverPicture->update(array_merge(
            $data,
            $imageArray??[],
        ));
        return redirect("profilepage/{$user->id}");
    }
}

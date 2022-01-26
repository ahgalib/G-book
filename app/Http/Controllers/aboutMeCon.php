<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\aboutMe;

class aboutMeCon extends Controller
{
    public function showindex(){
        return view('profile.aboutme');
    }

    public function saveAboutMe(Request $req){
        $req->validate([
            'Education'=>'required',
            'location'=>'required',
            'skill'=>'required',
            'note'=>'required',
            
        ]);
        $req->user()->aboutMe()->create([
            'Education'=>$req->Education,
            'location'=>$req->location,
            'skill'=>$req->skill,
            'note'=>$req->note,
        ]);
        return redirect("newVersionprofilepage/{$req->user()->id}");
    }
}

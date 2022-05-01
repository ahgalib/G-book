<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Session;
class settingCon extends Controller
{
    public function showSettingPage(){
        return view('setting.setting');
    }

    public function showSettingLoginPage(){
        return view('setting.login');
    }

    public function checkLoginFunctionality(Request $request){
        //return $request->all();

        $data = $request->validate([
            'password'=>'required',
        ]);
        if(Hash::check($data['password'],Auth::user()->password)){
            return redirect('/setting');
        }else{
            return back()->with('error','your password are not matched');
        }
    }

    public function updatePassword(Request $request){
        $data = $request->validate([
            'current_password'=>['required'],
            'password'=>['required','confirmed'],

        ]);
        if(Hash::check($data['current_password'],Auth::user()->password)){
            User::where('id',Auth::user()->id)->update(['password'=>bcrypt($data['password'])]);
            return back()->with('success','Your Password Updated Successfully');
        }else{
            return back()->with('error','Your Current Password is incorrect ');
        }
       
    }
}

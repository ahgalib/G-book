<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}

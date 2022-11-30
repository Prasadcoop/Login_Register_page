<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;
use Hash;

class MainController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.registration');
    }
    public function registerUser(Request $request)
    {
       $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:5|max:12'
       ]);
       $user = new User();
       $user ->email = $request->email;
       $user->password=Hash::make($request->password);
       $res = $user->save();
       if($res){
          return back()->with('success','YOU HAVE REGISTER SUCCESSFULLY');
       }else{
          return back()->with('fail','SOMETHING WRONG');
       }
    }
    public function loginUser(Request $req)
    {
        $req->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user =User::where('email','=',$req->email)->first();
        if ($user) 
        {
            // if($req->password::check($req->password,$user->password))
            //Hash::check($req->password,$user->password
            if(Hash::check($req->password,$user->password))
            {
                $req->session()->put('loginId',$user->id);
                return redirect('dashboard');
                
            }else{
                return back()->with('fail','INCORRECT PASSWORD.');
            }
        }
        else{
            return back()->with('fail','THIS EAMIL IS NOT REGISTER.');
        }
         
    }
    public function dashboard(){
        $data =array();
        if(Session::has('loginId')){
          $data=User::where('id','=',Session::get('loginId'))->first();
        }
        return view('auth.dashboard',compact('data'));
    }
    public function logout(){
      if (Session::has("loginId")){
        Session::pull("loginId");
        return redirect('login');
      }
    }

}

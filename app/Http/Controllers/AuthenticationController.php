<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AuthenticationController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function loginUser(Request $request){
        $user = Admin::where('email', '=',$request->email)->first();
        if($user){
            if($request->password == $user->password){
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }
            else{
                return redirect('/login')->with('message', 'Mot de pass incorrect');
            }
        }
        else{
            return redirect('/login')->with('message', 'Email Introuvable');
        }
    }

    public function dashboard(Request $request){
        $data = [];
        if(Session::has('loginId')){
            $data = Admin::where('id', '=',Session::get('loginId'))->first();
        }

        return view('admin.dashboard', compact('data'));
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/login');
        }
    }
}

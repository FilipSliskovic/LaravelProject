<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends FrontEndController
{
    public function index()
    {
        return view('pages.auth.login',["data" => $this->data]);
    }
    public function LoginUser(LoginRequest $request)
    {

        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();
        if(!$user){
            return redirect()->back()->with('error-msg', 'No user found!');
        }
        if(!Hash::check($password, $user->password)){
            return redirect()->back()->with('error-msg', 'Wrong password!');
        }
        Auth::login($user);
        $this->AddToLog('Logged in!');
        return redirect()->route('Home-index');
    }

    public function LogoutUser()
    {
        $this->AddToLog('Logged out!');
        Auth::logout();
        return redirect()->route('Home-index');
    }


}

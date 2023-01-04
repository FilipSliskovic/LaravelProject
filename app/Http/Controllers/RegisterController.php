<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class RegisterController extends FrontEndController
{
    public function index()
    {
        return view('pages.auth.register',['data' => $this->data]);
    }

    public function register(RegisterRequest $request)
    {
//        dd($request);
        try {
            $user = new User();
            $user->email = $request->email;
//            $user->password = $request->password;
            $user->password = Hash::make($request->password);
            $user->name = $request->username;
            $user->save();
            Auth::login($user);
            $this->AddToLog('Napravljen nalog');
            return redirect()->route('Home-index');
        }
        catch (\Exception $e) {
            $userTicket = uuid_create();
            Log::error($userTicket . " " . $e->getMessage());
            return  redirect()->back()->with("error-msg", "An error has occurred, please contact support with this ticket number " . $userTicket);
        }




    }
}

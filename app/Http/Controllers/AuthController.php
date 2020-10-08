<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            if(Auth::guard('user')->check())
            {
                return redirect()->route('products.index');
            }
        }
        else
        {
            return redirect()->route('login')->with(['message'=>"wrong credentials!"]);
        }
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        Auth::guard('admin')->logout();
        Auth::logout();
        return redirect('/');
    }

    public function forgot_password()
    {
        return view('auth.forgot_password');
    }

    public function forgot_password_process(Request $request)
    {
        $request->validate([
            'email'   => 'required|email'
        ]);

        $user = User::where('email',$request->email)->get();
        if($user->count()>0){
            $user = $user->first();
            $email = $user->email;
            return redirect()->route('reset_password',$email);
        }
        else{
            return redirect()->route('forgot_password')->with(['message'=>"sorry email id is not found!"]);
        }
    }

    public function reset_password($email)
    {
        return view('auth.reset_password',compact('email'));
    }

    public function reset_password_process(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::where('email',$request->email)->get();

        if($user->count()>0)
        {
            $user = $user->first();
            $user->password = Hash::make($request->password);
            if($user->save())
            {
                return redirect()->route('login');
            }
        }
    }

    public function adminLogin()
    {
        return view('auth.adminlogin');
    }

    public function adminLoginProcess(Request $request)
    {
        $request->validate([
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            if(Auth::guard('admin')->check())
            {
                return redirect()->route('users.index');
            }
        }
        else
        {
            return redirect()->route('admin.login')->with(['message'=>"wrong credentials!"]);
        }
    }
}

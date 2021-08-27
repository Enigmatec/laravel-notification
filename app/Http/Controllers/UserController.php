<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Events\NewUserhasRegisteredEvent;

class UserController extends Controller
{

    public function dashboard()
    {
        return view('Dashboard');
    }


   public function register(Request $request)
   {
       $data = $request->validate([
           'name' => ['required'],
           'email' => ['required', 'email'],
           'password' => ['required']
       ]);

    $data['password'] = bcrypt($data['password']);

    $user = User::create($data);
    event(new NewUserhasRegisteredEvent($user));

    return view('login');
   }

   public function login(Request $request)
   {
       $no_of_unread_comment = null;
       
       $data = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required']
       ]);

       if(!Auth::attempt($data)){
           return 'Incorrect login credentials';
       }

       $user = Auth::user();
       return view('Dashboard', compact('user'));
   }

   public function logout()
   {
       Auth::logout();
       return view('login');
   }

   
}



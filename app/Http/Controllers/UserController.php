<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Hash;
use Session;
use Auth;

class UserController extends Controller
{
    // Create new User
    public function registerUser(Request $req)
    {
        $req->validate([
            'email'=>'required|max:100|email|unique:User',
            'password'=>'required|min:6|max:100|confirmed',
            'first_name'=>'required|max:100',
            'nick_name'=>'required|max:50',
            'last_name'=>'required|max:100',
        ]);

        $user = new User();
        $user->email = $req->email;
        $user->first_name = $req->first_name;
        $user->nick_name = $req->nick_name;
        $user->middle_name = $req->middle_name ?? '';
        $user->last_name = $req->last_name;
        $user->password = Hash::make($req->password);
        $res = $user->save();

        if($res)
        {
            return redirect('login')->with('success', 'User has been registered successfully!');
        }
        
        return back()->with('failed', 'An error has occurred');
    }
    
    // Update User Profile
    public function updateUser(Request $req)
    {
        $req->validate([
            'first_name'=>'required|max:100',
            'nick_name'=>'required|max:50',
            'last_name'=>'required|max:100',
            'email'=>'required|max:100|email'
        ]);

        $user; 

        if (Session::has('user')) {
            $user = Session::get('user');
        }

        // Update Profile
        User::whereId($user->id)->update([
            'first_name' => $req->first_name,
            'nick_name' => $req->nick_name,
            'middle_name' => $req->middle_name ?? '',
            'last_name' => $req->last_name,
            'email' => $req->email
        ]);
        $user = User::where('id', '=', Session::get('loginId'))->first();
        $req->session()->put('user', $user);
        return back()->with("status", "Updated successfully!");
    }

    public function updatePassword(Request $req)
    {        
        // Validation
        $req->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed|different:old_password',
        ]);

        $user; 

        if (Session::has('user')) {
            $user = Session::get('user');
        }

        // Update the new Password
        User::whereId($user->id)->update([
            'password' => Hash::make($req->password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }
}

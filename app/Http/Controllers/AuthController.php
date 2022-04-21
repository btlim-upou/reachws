<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\ResetPasswordMail;
use Hash;
use Session;
use Auth;

class AuthController extends Controller
{
    public function loginUser(Request $req)
    {
        $req->validate([
            'email'=>'required|max:100',
            'password'=>'required|max:100'
        ]);

        $user = User::where('email', '=', $req->email)->first();

        if($user)
        {
            if(Hash::check($req->password, $user->password))
            {
                $req->session()->put('loginId', $user->id);
                $req->session()->put('user', $user);
                return redirect('/');
            }
        }
        
        return back()->with('failed', 'Email or password is invalid');
    }

    public function sendResetToken(Request $req)
    {
        $req->validate([
            'email'=>'required|max:100|email'
        ]);

        $user = User::where('email', '=', $req->email)->first();     
     
        if ($user)
        {
            // Post token to user by Email
            $token = Str::random(60);
            $response = User::where('email', $req->email)
                            ->update(['reset_password_token' => $token]);
            
            if ($response)
            {
                // Create the password link
                $link = url('') . '/validate-reset-token?token=' . $token;
                
                try 
                {
                    Mail::to($user->email)->send(new ResetPasswordMail([
                        'link' => $link, 
                        'email' => $user->email, 
                        'name' => $user->nick_name
                    ]));
                } 
                catch (Exception $e) 
                {
                    return back()->with('failed', 'An error has occurred when sending the email');
                }

                // successful generation of password link
                return redirect('login')->with('success', 'Please check your email for the next step');
            }

            return back()->with('failed', 'An error has occurred');
        }
        
        // Invalid email
        return back()->with('failed', 'Invalid email address');
    }

    
    public function resetPassword(Request $req)
    {
        // Parameter Validation
        $req->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        // Update password
        $response = User::where('reset_password_token', '=', $req->token)
                        ->update([
                            'password' => Hash::make($req->password),
                            'reset_password_token' => null
                        ]);

        

        if ($response)
        {
            return redirect('/login')->with('success', 'Your password has been successfully updated!');
        }
        
        return back()->with('failed', 'An error has occurred updating your password');
    }
    public function changePassword()
    {
        $user; 

        if (Session::has('user')) {
            $user = Session::get('user');
        }

        return view('change-password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        
        #Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        $user; 

        if (Session::has('user')) {
            $user = Session::get('user');
        }

        #Match the Old Password
        if(!Hash::check($request->old_password, $user->Password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        User::whereId($user->id)->update([
            'Password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }
      public function changeProfile()
    {
        $user; 

        if (Session::has('user')) {
            $user = Session::get('user');
        }

        return view('update-profile', compact('user'));
    }
    public function updateProfile(Request $request)
    {

        $request->validate([
            'first_name'=>'required|max:100',
            'nick_name'=>'required|max:50',
            'last_name'=>'required|max:100',
            'e_mail'=>'required|max:100|email'
        ]);

        $user; 

        if (Session::has('user')) {
            $user = Session::get('user');
        }


        #Update the new Profile
        User::whereId($user->id)->update([
            'FirstName' => $request->first_name,
            'NickName' => $request->nick_name,
            'MiddleName' => $request->middle_name ?? '',
            'LastName' => $request->last_name,
            'Email' => $request->e_mail
            
        ]);

        return back()->with("status", "Updated successfully");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Room;
use Hash;
use Session;
use Auth;

class ViewController extends Controller
{
    // Show Login Page
    public function showLogin()
    {
        return view("auth.login");
    }

    // Show Registration Page
    public function showRegister()
    {
        return view("auth.register");
    }

    // Show Logout Page and Clear Session Data
    public function showLogout()
    {
        Session::pull('loginId');
        return view('auth.logout');
    }
    public function changeProfile()
    {
        $user;

        if (Session::has('user')) {
            $user = Session::get('user');
        }

        return view('auth.update-user', ['user' => $user]);
    }
    // Show Passowrd Update Page
    public function showUpdatePassword()
    {
        $user;

        if (Session::has('user')) {
            $user = Session::get('user');
        }

        return view('auth.update-password', ['user' => $user]);
    }

    // Show Reset Password Page
    public function showResetPasswordRequest()
    {
        return view('auth.request-reset-password');
    }

    // Show Reset Password Form after verifying the request token
    public function showResetPasswordForm(Request $req)
    {
        // Get data from URI
        $query = $req->query();
        $user;

        if ($query) {
            if (!is_null($query['token']))
            {
                // Validate password reset token
                $user = User::where('reset_password_token', '=', $query['token'])->first();
                $user->token = $query['token'];
                unset($user->password);

                if ($user)
                {
                    return view('auth.reset-password', ['user' => $user]);
                }
            }
        }

        return redirect('/login')->with('failed', 'Invalid email / token');
    }

    // Show Main Home Page
    public function showHome()
    {
        $user = User::where('id', '=', Session::get('loginId'))->first();
        $rooms = DB::select('select * from view_room_members where user_id='.$user->id.'');
        $all_rooms = Room::all();
        return view('home', ['user' => $user, 'rooms' => $rooms, 'all_rooms' => $all_rooms]);
    }
}

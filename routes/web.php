<?php

use App\Events\MessageSent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Middleware\RedirectToHome;
use App\Http\Middleware\RedirectToLogin;
use App\Models\Message;
// use GuzzleHttp\Psr7\Request;
Use Illuminate\Http\Request;

// View Routes
Route::get('/', [ViewController::class, 'showHome'])->middleware(RedirectToLogin::class);
Route::get('/login', [ViewController::class, 'showLogin'])->middleware(RedirectToHome::class);
Route::get('/register', [ViewController::class, 'showRegister'])->middleware(RedirectToHome::class);
Route::get('/logout', [ViewController::class, 'showLogout'])->name('logout-user')->middleware(RedirectToLogin::class);
Route::get('/update-password', [ViewController::class, 'showUpdatePassword'])->middleware(RedirectToLogin::class);
Route::get('/update-user', [ViewController::class, 'changeProfile'])->middleware(RedirectToLogin::class);
Route::get('/reset-password', [ViewController::class, 'showResetPasswordRequest'])->middleware(RedirectToHome::class);
Route::get('/validate-reset-token', [ViewController::class, 'showResetPasswordForm']);
Route::get('/room/{id}', [RoomController::class, 'roomMessages'])->middleware(RedirectToLogin::class);
Route::get('/create-room', [RoomController::class, 'createRoomUser'])->middleware(RedirectToLogin::class);
Route::get('/add-room-member', [RoomController::class, 'addRoomUser'])->middleware(RedirectToLogin::class);


// Web API Endpoints
Route::post('/api/login-user', [AuthController::class, 'loginUser'])->name('login-user');
Route::post('/api/send-reset-token', [AuthController::class, 'sendResetToken'])->name('send-reset-token');
Route::post('/api/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');
Route::post('/api/register-user', [UserController::class, 'registerUser'])->name('register-user');
Route::post('/api/update-user', [UserController::class, 'updateUser'])->name('update-user');
Route::post('/api/update-password', [UserController::class, 'updatePassword'])->name('update-password');
Route::post('/api/create-room', [RoomController::class, 'createRoom'])->name('create-room');
Route::post('/api/add-room-member', [RoomController::class, 'addmember'])->name('add-room-member');
Route::post('/send-message', [RoomController::class, 'sendMessage'])->name('send-message');

Route::post('/send-websocket', function(Request $request){
    event(
        new MessageSent(
            $request->input('message'),
            $request->input('user_id'),
            $request->input('room_id'),
        )
        );
    return ["success" => true];

});

// Undefined Routes
//Route::any('/{page?}',function(){ return View::make('error.404'); })->where('page','.*');

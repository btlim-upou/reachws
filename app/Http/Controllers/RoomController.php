<?php

namespace App\Http\Controllers;

use App\Events\WebSocketDemoEvent;
use App\Models\Room;
use App\Models\RoomUser;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use Session;
use Carbon\Carbon;

class RoomController extends Controller
{
    public function roomMessages($room_id) {
        $user = User::where('id', '=', Session::get('loginId'))->first();
        $members = DB::select('select * from view_room_members where room_id='.$room_id.' and user_id != ' . $user->id);
        $is_member = RoomUser::where('room_id',$room_id)->where('user_id',$user->id)->count();
        if($is_member == 0) {
            $new_room_user = new RoomUser();
            $new_room_user->room_id = $room_id;
            $new_room_user->user_id = $user->id;
            $new_room_user->status_id = 1;
            $res_new_member = $new_room_user->save();
        }
        $all_rooms = Room::all();
        $room = Room::find($room_id);
        $messages = DB::select('select * from view_room_messages where room_id='.$room_id.' order by id');
        $rooms = DB::select('select * from view_room_members where user_id='.$user->id.'');
        // broadcast(new WebSocketDemoEvent('some data, Greeting! Hello World!'));
        return view('room', compact('user','members', 'room', 'rooms','messages','all_rooms'));
    }

    public function sendMessage(Request $request) {
        // $request->validate([
        //     'message'=>'required',
        // ]);
        $dt = Carbon::now()->toDateTimeLocalString();
        $user_id = $request->input('user_id');
        $room_id = $request->input('room_id');
        $message = $request->input('message');
        $user_info = DB::table('User')->where('id', $user_id)->select('id','nick_name','first_name','last_name')->first();
        $message_date = $dt;
        event(
            new MessageSent(
                $message,
                $message_date,
                $user_id,
                $room_id,
                $user_info,
            )
            );
        $message = new Message;
        $message->room_id = $room_id;
        $message->sent_by = $user_id;
        $message->message = $request->message;
        $message->attachment = '';
        $message->status_id = 1;
        $message->created_at = $dt;
        $message->updated_at = $dt;
        
        $res = $message->save();

        // event(new MessageSent($message, $sender));
        // broadcast(new MessageSent($message, $sender));
        // if($res){
        //     // return back()->with('success', 'Message sent successfully');
        //     return ["success" => true];
        // } else {
        //     // return back()->with('fail', 'Message sending failed.');
        //     return ["success" => false];
        // }

        return ["success" => true];

    }

    public function rooms() {
        $user = User::where('id', '=', Session::get('loginId'))->first();
//        $members = DB::select('select * from view_room_members where RoomId=1 and UserId != ' . Session::get('loginId'));
        $all_rooms = Room::all();
        $rooms = Room::all();
//        $result = DB::select('select * from view_room_messages where Roomid=1 order by Id');


        return view('rooms', compact('rooms', 'user', 'all_rooms'));

    }

    public function createRoom(Request $req)
    {
        $req->validate([      
            'room_name'=>'required|max:50',
            'description'=>'required|max:100',
        ]);

        $room = new Room();
        $roomuser = new RoomUser();
       
        $room->name = $req->room_name;
        $room->description = $req->description;      
        $res = $room->save();

        $new_room = Room::where('name', '=', $req->room_name)->first();
        $roomuser->room_id = $new_room->id;
        $roomuser->user_id = Session::get('loginId');
        $roomuser->status_id = 1;
        $res2 = $roomuser->save();

        return back()->with("success", "added successfully");
    }

    public function createRoomUser()
    {
        $user;

        if (Session::has('user')) {
            $user = Session::get('user');
        }

        return view('create-room', compact('user'));
    }
    public function addmember(Request $req)
    {
        $req->validate([      
            'room_name'=>'required',
            'member_name'=>'required',
        ]);
       
        $roomuser = new RoomUser();       
        $roomuser->room_id = $req->room_name;
        $roomuser->user_id = $req->member_name;
        $roomuser->status_id = 1;  
        $res = $roomuser->save();

        return back()->with("success", "added successfully");
    }
    public function addRoomUser()
    {
        $rooms = Room::all();
        $user = User::all();

        return view('add-room-member', compact('rooms','user'));
    }
}

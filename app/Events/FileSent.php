<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FileSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $sender;
    public $room_id;
    public $user_info;
    public $message_date;
    public $file;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $message_date, $sender, $room_id, $user_info, $file)
    {
        $this->message = $message;
        $this->message_date = $message_date;
        $this->sender = $sender;
        $this->room_id = $room_id;
        $this->user_info = $user_info;
        $this->file = $file;
        //$this->dontBroadcastToCurrentUser();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('reachat.link');
    }

    public function broadcastAs()
    {
        return 'file-sent';
    }
}

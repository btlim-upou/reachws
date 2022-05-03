<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TypingStatus implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $room_id;
    public $user_id;
    public $user;
    public $typing;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($room_id, $user_id, $user, $typing)
    {
        $this->room_id = $room_id;
        $this->user_id = $user_id;
        $this->user = $user;
        $this->typing = $typing;
        $this->dontBroadcastToCurrentUser();

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
        return 'typing-status';
    }

}

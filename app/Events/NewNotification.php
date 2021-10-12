<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Str;

class NewNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user_id;
    public $post_id;
    public $comment;
    public $date;
    public $time;
    public function __construct($data = [])
    {
        $this->user_id = $data['user_id'];
        $this->post_id = $data['post_id'];
        $this->comment = $data['comment'];
        $this->date = $data['date'];
        $this->time = $data['time'];

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new PrivateChannel('new-notification');
        return ['new-notification'];
    }


}

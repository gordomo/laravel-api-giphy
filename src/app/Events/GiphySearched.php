<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GiphySearched
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    public $service;
    public $query;
    public $http_response;
    public $response;
    public $requester_ip;

    /**
     * Create a new event instance.
     */
    public function __construct($user_id, $service, $query, $http_response, $response, $requester_ip)
    {
        $this->user_id = $user_id;
        $this->service = $service;
        $this->query = $query;
        $this->http_response = $http_response;
        $this->response = $response;
        $this->requester_ip = $requester_ip;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}

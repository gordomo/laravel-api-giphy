<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\GiphyInteractions;
use App\Events\GiphySearched;

class SaveGiphyEvent
{
    /**
     * Create the event listener.
     */
    public function __construct()
    { 
        //
    }

    /**
     * Handle the event.
     */
    public function handle(GiphySearched $event): void
    {
        $interaction = new GiphyInteractions();
        $interaction->user_id = $event->user_id;
        $interaction->service = $event->service;
        $interaction->query = $event->query;
        $interaction->http_response = $event->http_response;
        $interaction->response = $event->response;
        $interaction->requester_ip = $event->requester_ip;  

        $interaction->save();
    }
}

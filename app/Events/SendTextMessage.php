<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendTextMessage
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct($to, $message)
    {
        $this->sendMessageByGreenWeb($to, $message);
    }

    public function sendMessageByGreenWeb($to, $message)
    {
        $url = "http://api.greenweb.com.bd/api.php";
        $token = "59573f49e73c99b6bca2b518a4e3f94c";

        $data = array(
            'to' => "$to",
            'message' => "$message",
            'token' => "$token"
        );
         // Add parameters in key value
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
        $smsresult = curl_exec($ch);

    } 
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

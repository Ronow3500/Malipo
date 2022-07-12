<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class MtechSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $number, $msg;
    /**
     * Create a new job instance.
     *
     * @return void
     */



    public function __construct($number, $msg)
    {
      
        $this->number = $number;
        $this->msg = $msg;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Set your app credentials
        // $username   = "";
        // $apiKey     = "";


        
        $token = Http::withoutVerifying()->withHeaders([
            'Content-Type' => 'application/json'
        ])->post("https://api.mtechcomm.co.ke/index.php/auth/token",[
            "username"=> "kennethkipchumba",
           "password"=> "6b2zpr205a2ajp6znraocq19q1dj3fzll1wbk7g642nio"
        ]);

        $res = $token->json();

        $tok = $res["data"]["token"];



        // Set the numbers you want to send to in international format
        $recipients = "254" . $this->number;

        // Set your message
        $message    = $this->msg;

    
        try {
            // Thats it, hit send and we'll take care of the rest
            $result = Http::withoutVerifying()->withHeaders([
                'Authorization' => 'Bearer ' . $tok,
                'Content-Type' => 'application/json'

            ])->post("https://api.mtechcomm.co.ke/index.php/messaging/send", [

                "message" => $message, 
                "sender" => "TIFA",
                "message_type"=> "Transactional",
                "dlr_url"=> "http://receives-delivery-report-callback.test/",
                "msisdns"=> [
                $recipients
                 ],
                "message_id" => "tifa-sms-" . Str::random(6)
            ]);

        
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

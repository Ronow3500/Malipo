<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

use AfricasTalking\SDK\AfricasTalking;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $number;
    public $name;
    public $message;

    public function __construct($number, $name, $message)
    {
        $this->number  = $number;
        $this->name    = $name;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // App Credentials
        $username = "tifasms";
        $apiKey   = "49f17fbcd97dfd4ad8c87a6cb59c0196565ce9f79d6034929a9c853a54ef25e2";

        //Initializing the SDK
        $AT = new AfricasTalking($username, $apiKey);

        // Sms Service
        $sms = $AT->sms();

        $recipients = "+254" . $this->number;
        $message    = $this->message;

        // ShortCode|SenderId
        $from = "20384";
        $keyword = "Tifa";

        try {
            $result = $sms->send([
                'to'      => $recipients,
                'message' => $message,
                'from'    => $from,
                'keyword' => $keyword
            ]);
            Log::alert($results);
            print_r($result);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

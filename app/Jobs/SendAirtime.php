<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Sent;
use Illuminate\Support\Facades\Storage;
use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Support\Facades\Log;

class SendAirtime implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $number;
    public $amount;

    public function __construct($number, $amount)
    {
        $this->number = $number;
        $this->amount = $amount;
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
        $apiKey     = "49f17fbcd97dfd4ad8c87a6cb59c0196565ce9f79d6034929a9c853a54ef25e2";

        // Initialize the SDK
        $AT = new AfricasTalking($username, $apiKey);

        // Getting the Airtime Service
        $airtime = $AT->airtime();

        $recipients = [[
            "phoneNumber" => "+254" . $this->number,
            "currencyCode" => "KES",
            "amount" => $this->amount
        ]];

        try {
            $results = $airtime->send([
                "recipients" => $recipients
            ]);

            Log::alert($results);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

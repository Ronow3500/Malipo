<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;

use Maatwebsite\Excel\Facades\Excel;
// use App\Jobs\SendAirtime;
use App\Imports\ListImport;
use App\Jobs\SendAirtime;
use App\Jobs\SendSms;

class AirtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['header'] = 'Dashboard';

        // App credentials
        $username   = "tifasms";
        $apiKey     = "49f17fbcd97dfd4ad8c87a6cb59c0196565ce9f79d6034929a9c853a54ef25e2";

        $AT = new AfricasTalking($username, $apiKey);

        return view('home.dashboard', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload_csv()
    {
        $data['header'] = 'Upload CSV File';

        return view('home.upload_csv', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Import the csv file and queue the job
     */
    public function import_csv(Request $request)
    {
        if ($request->hasFile('file'))
        {
           $test = $request->file('file')->getMimetype();
           //dd($test);

            $array = Excel::toArray(new ListImport, $request->file);

            //dd($array);

            foreach ($array[0] as $key => $value) {
               if ($key === 0) {
                   # code...
               } else {

               /**
                * Dispatch Sms and Airtime to the job
                */

              //SendSms::dispatch($value[1], $value[0], $value[3]);
              sendAirtime::dispatch($value[1], $value[2]);
               }
            }

            //echo "Queued";
            $request->session()->flash('success', 'Incentives have been queued and ready to be sent. Kindly notify the developer to initiate the process.');

            return redirect()->route('success');
           
        }
        else
        {
            //die('Empty Upload/Nothing to Upload');
            $request->session()->flash('warning', 'That Was An Empty File Selected  Thus Nothing for the system to Upload | Please Ensure That You  Select a Valid CSV File To Upload');

            return redirect()->route('error');
        }
    }

    public function sendAirtime($number)
    {
        // Set your app credentials
        $username   = "tifasms";
        $apiKey     = "49f17fbcd97dfd4ad8c87a6cb59c0196565ce9f79d6034929a9c853a54ef25e2";


        // Initialize the SDK
        $AT = new AfricasTalking($username, $apiKey);

        // Get the airtime service
        $airtime  = $AT->airtime();

        // Set the phone number, currency code and amount in the format below
        $recipients = [[
            "phoneNumber"  => "+254719208737",
            "currencyCode" => "KES",
            "amount"       => 5
        ]];

        try {
            // That's it, hit send and we'll take care of the rest
            $results = $airtime->send([
                "recipients" => $recipients
            ]);

            print_r($results);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

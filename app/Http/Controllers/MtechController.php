<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\MtechSms;

use Maatwebsite\Excel\Facades\Excel;

use App\Imports\ListImport;

class MtechController extends Controller
{
    /**
     * Display view file
     */
    public function sms()
    {
        $data['header'] = 'SMS';

        return view('home.sms');
    }

    public function import_recepients(Request $request)
    {

        $array = Excel::toArray(new ListImport, $request->file);


       
        foreach ($array[0] as $key => $value) {
            if ($key === 0) {
                # code...
            } else {
                MtechSms::dispatch($value[0], $value[1])->delay(now()->addMinutes(0.1));
                // echo (json_encode($value[2]));
                // echo '<br/>';
            }
        }

        // $json = json_encode($array[0]);

        // echo $json;
        // foreach ($array as  $item) {

        //     echo ();
        //     echo ("<br/>");
        //     # code...
        // }



        //echo "Queued";

        return redirect()->back()->with('success', "SMS's have been queued");
    }
   
    
}



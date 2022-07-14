<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        $data['header'] = 'Finance';

        return view('finance.index', $data);
    }

    public function api_auth()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.mtechcomm.co.ke/index.php/auth/token',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
          "username": "kennethkipchumba",
          "password": "6b2zpr205a2ajp6znraocq19q1dj3fzll1wbk7g642nio"
        }',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;

    }

    public function sms_balance($post = null, $agent =null)
    {
        $curl = curl_init();
        $username = 'kennethkipchumba';
        $password = '6b2zpr205a2ajp6znraocq19q1dj3fzll1wbk7g642nio';

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.mtechcomm.co.ke/index.php/messaging/balance',
          CURLOPT_HTTPAUTH => CURLAUTH_ANY,
          CURLOPT_USERPWD => "$username:$password",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }
}

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
        $url = 'https://api.mtechcomm.co.ke/index.php/';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 6);
        if ($post) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        }
        if ($agent) {
            curl_setopt($curl, CURLOPT_USERAGENT, $agent);
        }
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
}

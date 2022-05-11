<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class LogController extends Controller
{
    /**
     * Display System Logs
     */
    public function index(Request $request)
    {
        if ( ! file_exists(base_path('storage/logs/laravel.log')))
        {
            return redirect()->back()->with('error', 'Log file was not found');
        }

        $data['logs'] = file_get_contents(base_path('storage/logs/laravel.log'));
            //dd($data);

        return view('system/logs', $data);
    } 
}

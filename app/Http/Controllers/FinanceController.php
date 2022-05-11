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
}

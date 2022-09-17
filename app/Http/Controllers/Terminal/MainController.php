<?php

namespace App\Http\Controllers\Terminal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('terminal.dashboard');
    }

    public function order(Request $request)
    {
        dd($request->all());
    }
}

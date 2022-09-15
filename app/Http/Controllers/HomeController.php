<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:project,terminal');
    }

    public function __invoke()
    {
        return view('welcome');
    }

}

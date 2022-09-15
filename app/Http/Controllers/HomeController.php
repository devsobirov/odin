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
        if (auth()->guard('project')->check()) {
            return redirect()->route('project.home');
        }

        if (auth()->guard('terminal')->check()) {
            return redirect()->route('terminal.home');
        }

        abort(404);
    }

}

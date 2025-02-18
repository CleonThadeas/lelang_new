<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Session::has('username')) {
            return redirect()->route('login.form');
        }

        $level = Session::get('level'); 
        return view('dashboard', compact('level'));
    }
}
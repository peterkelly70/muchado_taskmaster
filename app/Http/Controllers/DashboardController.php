<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// TODO DashboardController for the user dashboard
class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class allcontroller extends Controller
{
    public function admindashboard()
    {
        return view('admin.admin-dashboard');
    }
}

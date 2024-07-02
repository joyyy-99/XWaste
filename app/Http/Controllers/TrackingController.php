<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        return view('tracking.index'); 
    }
    public function index1()
    {
        return view('tracking.admin.index1'); 
    }
}

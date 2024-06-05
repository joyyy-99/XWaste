<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->usertype == '0' )
        {
            return view ('dashboard');
        }
        else
        {
            $adminController = new AdminController();
            return $adminController->index();
        }
    }
}

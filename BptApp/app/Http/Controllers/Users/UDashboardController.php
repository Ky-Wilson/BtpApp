<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UDashboardController extends Controller
{
    //
     public function index(){
        return view('users.dashboard');
    }
}

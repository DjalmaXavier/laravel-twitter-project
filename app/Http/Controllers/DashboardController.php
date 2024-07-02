<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Created with artisan make:controller DashboardController


class DashboardController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}

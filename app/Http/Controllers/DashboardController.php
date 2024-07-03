<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Created with artisan make:controller DashboardController


class DashboardController extends Controller
{
    public function index()
    {



        $users = [
            [
                'name' => 'Jorge',
                'age' => 30
            ],
            [
                'name' => 'Lonn',
                'age' => 21
            ],
            [
                'name' => 'Blade',
                'age' => 22
            ],
            [
                'name' => 'Vitor',
                'age' => 16
            ],
        ];
        return view('dashboard', ['users' => $users]);
    }
}

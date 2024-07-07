<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

//Created with artisan make:controller DashboardController


class DashboardController extends Controller
{
    public function index()
    {
        return view(
            'dashboard',
            [
                'ideas' => Idea::orderBy('created_at', 'DESC')->paginate(5)
            ]
        );
    }
}

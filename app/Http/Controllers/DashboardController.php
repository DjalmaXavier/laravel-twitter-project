<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

//Created with php artisan make:controller DashboardController


class DashboardController extends Controller
{
    public function index()
    {

        $ideas = Idea::orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            $ideas = $ideas->search(request('search', ''));
        }

        return view(
            'dashboard',
            [
                'ideas' => $ideas->paginate(5)
            ]
        );
    }
}

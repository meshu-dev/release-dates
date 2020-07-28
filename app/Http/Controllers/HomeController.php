<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Release;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the API status.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function apiIndex()
    {
        return response()->json([
            'status' => 'Ok'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
    public function apiIndex(): Response
    {
        return response()->json([
            'status' => 'Ok'
        ]);
    }
}

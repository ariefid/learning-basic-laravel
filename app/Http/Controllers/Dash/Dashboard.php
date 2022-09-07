<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        return response()->view('dash.dashboard');
    }
}

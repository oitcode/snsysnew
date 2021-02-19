<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicSubmitController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* TODO: Should user be logged in? */
        // $this->middleware('auth');
    }

    /**
     * Show the submission page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('public-submit');
    }
}

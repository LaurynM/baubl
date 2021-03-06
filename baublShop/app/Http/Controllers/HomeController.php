<?php

namespace baubl\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function design()
    {
        return view('design');
    }
    public function buy()
    {
        return view('buy');
    }
    public function commission()
    {
        return view('commission');
    }
}

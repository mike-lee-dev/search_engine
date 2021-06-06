<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function search()
    {
        return view('user.search');
    }
    public function mailSetting()
    {
        return view('user.mail-setting');
    }
    public function result()
    {
        return view('user.result');
    }
    public function detail()
    {
        return view('user.detail');
    }
}

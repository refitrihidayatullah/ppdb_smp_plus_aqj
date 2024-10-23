<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        return view('pages.home.index');
    }

    public function auth()
    {
        return view('pages.home.auth');
    }

    public function register()
    {
        return view('pages.home.register');
    }
}

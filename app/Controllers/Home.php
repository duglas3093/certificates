<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        return view('users/index');
    }

    public function contact()
    {
        // return view('welcome_message');
        return view('users/contact');
    }
}

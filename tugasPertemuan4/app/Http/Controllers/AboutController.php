<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('navbar.about', [
            'name'=>'Antony Santos',
            'email'=>'elgasing@gmail.com'
        ]);
    }
}

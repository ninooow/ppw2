<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('navbar.contact', [
            'email'=>'ninoauliyanahara@mail.ugm.ac.id',
            'nomor'=>'085225434185',
            'instagram'=>'@nino_nhr'
        ]);
    }
}

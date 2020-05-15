<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppControl extends Controller
{
    public function home(){
    	return view('utama');
    }
}

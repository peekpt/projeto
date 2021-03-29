<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // construtor da classe
    public function __invoke()
    {
        return view('welcome');
    }
}

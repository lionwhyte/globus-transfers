<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index(){
        return view('home', ['apiKey' => env('GOOGLE_MAPS_API_KEY')]);
    }
}

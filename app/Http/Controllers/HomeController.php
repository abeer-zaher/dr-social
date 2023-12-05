<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Gener;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $films = Film::all();
        return view('home')->with('films',$films);
    }
}

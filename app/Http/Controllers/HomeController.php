<?php

namespace App\Http\Controllers;

use App\Models\API\Region;
use App\Models\User;
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
        
        // dd(Region::find(1)->name);
        $test = Region::find(4)->name;
        return view('home', compact('test'));
    }
}

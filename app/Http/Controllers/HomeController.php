<?php

namespace App\Http\Controllers;

use App\Models\API\EquipmentCondition;
use App\Models\API\Region;
use App\Models\API\Station;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $result = [];
        $ips = ['10.19.1.1','10.19.1.2','10.19.1.3','10.19.1.4','10.19.1.5','10.19.1.16','10.19.1.7','10.19.1.9'];
        foreach($ips as $ip){
            exec("ping -n 1 $ip", $output, $status);
            $result[] = $status;
        }
        
        // dd($status);
        // return $status;
        return view('home')->with('result', $result);
    }
}

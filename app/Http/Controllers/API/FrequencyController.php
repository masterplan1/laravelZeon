<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\Frequency;
use Illuminate\Http\Request;

class FrequencyController extends Controller
{
    public function sfnList($frequency, $number){

        $f = Frequency::where('frequency', $frequency)->first();

        if(in_array($number, [1, 2, 3])){
            $stations = ($number == 1) ? $f->sfn_mx1 : ($number == 2 ? $f->sfn_mx2 : $f->sfn_mx3);
            
            return response()->json($stations);
        }
        
        return false;
    }
}

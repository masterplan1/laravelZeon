<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\StationResource;
use App\Models\API\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = StationResource::collection(Station::all());
        return $stations;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        return new StationResource($station);
    }

    public function searchByNumber(Request $request){
        $result = [];
        $needle = $request->needle ?? '';
        if($needle){
            $stations = Station::select('id', 'name', 'number')->where('number', 'LIKE', "%{$needle}%")
            ->orWhere('name', 'LIKE', "%{$needle}%")
            ->get();
            $result =  $stations->map(function($item){
                return ['id' => $item->id, 'station' => $item->gerNumberAndName()];
            });
        }
        return response()->json($result);
    }

    public function contactsByStations(Station $station){
      $phones = $station->phones;
      return response()->json($phones);  
    }

    public function ping(Station $station){
        $result = [];
        if($station){
            $second_octet = $station->district->ip_second_octet;
            $third_octet = $station->base_ip;
            $ip = "10.$second_octet.$third_octet.";
            
            $allowedIps = ['asa' => 1, 'switch' => 2, 'console' => 3, 'server4' => 4, 'ups' => 5,
             'server6' => 6, 'telescaner' => 7, 'ip_socket' => 9, 'transm1' => 21, 'gps1' => 51];
            if(!$station->params->only_mx1){
                $allowedIps = array_merge($allowedIps, ['transm2' => 22, 'transm3' => 23, 'transm5' => 25,
                'pvr1' => 31, 'pvr2' => 32, 'pvr3' => 33, 'pvr4' => 34, 'mux' => 41]);
            }
            if($station->params->power > 900) $allowedIps['gps2'] = 52;
            if($station->params->has_dvb) $allowedIps['dvb'] = 88;

            foreach($allowedIps as $key=>$item){
                $currentIp = $ip.$item;

                if($key == 'asa') {$result[$key] = 0; continue;} //asd
                if($key == 'switch') {$result[$key] = 0; continue;} //asd
                if($key == 'console') {$result[$key] = 0; continue;} //asd
                if($key == 'server4') {$result[$key] = 0; continue;} //asd
                if($key == 'server6') {$result[$key] = 0; continue;} //asd
                if($key == 'telescaner') {$result[$key] = 0; continue;} //asd
                if($key == 'ip_socket') {$result[$key] = 0; continue;} //asd
                if($key == 'transm1') {$result[$key] = 0; continue;} //asd
                if($key == 'gps1') {$result[$key] = 0; continue;} //asd

                exec("ping -n 1 $currentIp", $output, $status);
                $result[$key] = $status;
                if($result['asa'] == 1) return false;
            }
        }
        return $result;
    }

    public function pingItem($ip){
        exec("ping -n 3 $ip", $output, $status);
        return $status;
    }

    
 


}

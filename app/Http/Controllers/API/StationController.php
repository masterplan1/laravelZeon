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

    
 


}

<?php

namespace App\Http\Controllers\API;

use App\Exports\ConditionExport;
use App\Exports\EquipmentConditionExport;
use App\Http\Controllers\Controller;
use App\Exports\UsersExport;
use App\Mail\SendMail;
use App\Models\API\EquipmentCondition;
use App\Models\API\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ConditionController extends Controller
{
    public function export() 
    {
        Excel::store(new ConditionExport, 'Стан обладнання.xlsx');
        return response(Storage::get('Стан обладнання.xlsx'))
            ->header('Content-Type', Storage::mimeType('Стан обладнання.xlsx'));
    }

    public function equipment(Station $station){
        return response()->json($station->equipments);
    }
    public function create(Request $request){
        $request->validate([
            'key' => 'required',
            'note' => 'required | min:10'
        ]);
        $stationId = $request->post('stationId');
        $key = $request->post('key');
        $note = $request->post('note');
        $equipModel = EquipmentCondition::where('station_id', $stationId)->first();
        
        if($equipModel->$key){
            $oldNote = $equipModel->$key ?? null;
            $newNote = $oldNote . '; ' . $note;
            $equipModel->$key = $newNote;
        }else{
            $equipModel->$key = $note;
        }
        return $equipModel->save();
    }

    public function edit(Request $request){
        $request->validate([
            'note' => 'required',
            'key' => 'required'
        ]);
        $note = $request->post('note');
        $key = $request->post('key');
        $stationId = $request->post('stationId');
        if($stationId){
            $equipModel = EquipmentCondition::where('station_id', $stationId)->first();
            $equipModel->$key = $note;
            return $equipModel->save();
        }
        return false;
    }

    public function delete(Request $request){
        $stationId = $request->post('stationId');
        $key = $request->post('key');
        $equipModel = EquipmentCondition::where('station_id', $stationId)->first();
        $equipModel->$key = null;
        return $equipModel->save();
    }

    public function sendEquipsEmail(Request $request){
        $user = $request->post('user');
        Excel::store(new ConditionExport, 'Стан обладнання.xlsx');
        // Mail::to(['v.prokopenko@zeonbud.com.ua', 'v.gritsyk@zeonbud.com.ua'])->send(new SendMail($user));
        Mail::to(['masterplan1@ukr.net'])->send(new SendMail($user));
        return true;
    }
}
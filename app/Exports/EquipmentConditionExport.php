<?php

namespace App\Exports;

use App\Http\Resources\ConditionResource;
use App\Models\API\Station;
use App\Models\EquipmentCondition;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class EquipmentConditionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return new Collection([
        //     [123,123,123],
        //     [12,32,12]
        // ]);
    }
}

<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function district(){
        return $this->belongsTo(District::class);
    }
    public function region(){
        return Region::where('id', $this->district->region_id)->first();
    }
    public function makeSearchResponce(){
        return 'asd';
    }

    public function gerNumberAndName(){
        return $this->number . " - " . $this->name;
    }
    public function params(){
        return $this->hasOne(StationParams::class);
    }
    public function getMx1Frequency(){
        return  $this->belongsToMany(Frequency::class, 'mx_frequencies', 'station_id', 'mx1_frequency_id');
    }
    public function getMx2Frequency(){
        return  $this->belongsToMany(Frequency::class, 'mx_frequencies', 'station_id', 'mx2_frequency_id');
    }
    public function getMx3Frequency(){
        return  $this->belongsToMany(Frequency::class, 'mx_frequencies', 'station_id', 'mx3_frequency_id');
    }
    public function getMx5Frequency(){
        return  $this->belongsToMany(Frequency::class, 'mx_frequencies', 'station_id', 'mx5_frequency_id');
    }

    public function phones(){
        return $this->hasMany(Phone::class);
    }
}

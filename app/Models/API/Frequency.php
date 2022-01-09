<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frequency extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $hidden = ['id', 'pivot'];

    public function sfn_mx1(){
        return $this->belongsToMany(Station::class, 'mx_frequencies', 'mx1_frequency_id', 'station_id');
    }
    public function sfn_mx2(){
        return $this->belongsToMany(Station::class, 'mx_frequencies', 'mx2_frequency_id', 'station_id');
    }
    public function sfn_mx3(){
        return $this->belongsToMany(Station::class, 'mx_frequencies', 'mx3_frequency_id', 'station_id');
    }
}

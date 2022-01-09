<?php

use App\Models\API\District;
use App\Models\API\Provider;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->integer('base_ip');
            $table->string('name');
            $table->integer('number');
            $table->integer('status');
            $table->foreignId('provider_id');
            $table->foreignIdFor(District::class, 'district_id')->constrained();
        });
    }
    // 2021_12_19_095022_create_stations_table.php
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
}

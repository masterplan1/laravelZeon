<?php

use App\Models\API\Station;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_conditions', function (Blueprint $table) {
            $table->id();
            $table->string('sat1')->default(null)->nullable();
            $table->string('sat2')->default(null)->nullable();
            $table->string('pvr1')->default(null)->nullable();
            $table->string('pvr2')->default(null)->nullable();
            $table->string('pvr3')->default(null)->nullable();
            $table->string('pvr4')->default(null)->nullable();
            $table->string('trans1')->default(null)->nullable();
            $table->string('trans2')->default(null)->nullable();
            $table->string('trans3')->default(null)->nullable();
            $table->string('trans4')->default(null)->nullable();
            $table->string('mux')->default(null)->nullable();
            $table->string('gps1')->default(null)->nullable();
            $table->string('gps2')->default(null)->nullable();
            $table->string('ups')->default(null)->nullable();
            $table->string('temp')->default(null)->nullable();
            $table->string('asa')->default(null)->nullable();
            $table->string('cisco')->default(null)->nullable();
            $table->string('console')->default(null)->nullable();
            $table->string('server')->default(null)->nullable();
            $table->string('telescaner')->default(null)->nullable();
            $table->string('reg_channel')->default(null)->nullable();
            $table->string('other')->default(null)->nullable();
            $table->string('communication')->default(null)->nullable();
            $table->foreignIdFor(Station::class, 'station_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_conditions');
    }
}

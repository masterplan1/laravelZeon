<?php

use App\Models\API\Station;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_params', function (Blueprint $table) {
            $table->id();
            $table->integer('power');
            $table->boolean('is_krrt')->default(false);
            $table->text('address')->nullable();
            $table->string('gsm_modem');
            $table->string('ip_wan');
            $table->integer('has_personal');
            $table->boolean('has_dvb');
            $table->string('password');
            $table->boolean('is_new_transmitter')->default(false);
            $table->boolean('only_mx1')->default(false);
            $table->foreignIdFor(Station::class, 'station_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('station_params');
    }
}

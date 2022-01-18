<?php

use App\Models\API\Station;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMxFrequenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mx_frequencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mx1_frequency_id');
            $table->foreignId('mx2_frequency_id')->nullable();
            $table->foreignId('mx3_frequency_id')->nullable();
            $table->foreignId('mx5_frequency_id')->nullable();
            $table->foreignId('dvbh_frequency_id')->nullable();
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
        Schema::dropIfExists('mx_frequencies');
    }
}

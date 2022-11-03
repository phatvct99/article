<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip',50)->nullable();
            $table->string('country_name',30)->nullable();
            $table->string('country_code',15)->nullable();
            $table->string('region_name',30)->nullable();
            $table->string('city_name',30)->nullable();
            $table->string('latitude', 15)->nullable();
            $table->string('longitude', 15)->nullable();
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
        Schema::dropIfExists('location');
    }
}

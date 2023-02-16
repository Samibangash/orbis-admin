<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rate_id');
            $table->string('label');
            $table->decimal('value', 10, 2)->default('0');
            $table->timestamps();
            $table->foreign('rate_id')->references('id')->on('rates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate_values');
    }
}

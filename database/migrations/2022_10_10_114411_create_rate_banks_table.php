<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_banks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable(true);
            $table->boolean('active')->default(1)->comment("1 is Active && 0 is Inactive");
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
        Schema::dropIfExists('rate_banks');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_banks', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(true);
            $table->string('name');
            $table->string('submission_process');
            $table->string('acreditation_process');
            $table->boolean('active')->default(1)->comment("1 is Active && 0 is InActive");
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
        Schema::dropIfExists('lender_banks');
    }
}

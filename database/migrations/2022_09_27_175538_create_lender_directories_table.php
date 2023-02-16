<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_directories', function (Blueprint $table) {
            $table->id();
            $table->string('bank_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('position');
            $table->boolean('active')->default(1)->comment("1 is Active && 0 is Inactive");
            $table->softDeletes();
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
        Schema::dropIfExists('lender_directories');
    }
}

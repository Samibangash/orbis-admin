<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolicyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_details', function (Blueprint $table) {
            $table->id();
            $table->string('bank_id');
            $table->string('policy_id');
            $table->longText('description');
            $table->integer('created_by');
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
        Schema::dropIfExists('policy_details');
    }
}

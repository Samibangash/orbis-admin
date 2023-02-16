<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('bank_id');
            $table->integer('type_id');
            $table->decimal('high_rate');
            $table->decimal('rental');
            $table->decimal('conv_one');
            $table->decimal('conv_two');
            $table->decimal('conv_three');
            $table->decimal('conv_four');
            $table->decimal('uninsurable_conv');
            $table->decimal('uninsurable_refinance');
            $table->decimal('amortization');
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
        Schema::dropIfExists('rate_lists');
    }
}

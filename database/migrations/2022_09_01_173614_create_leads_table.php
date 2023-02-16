<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->decimal('add_extra_payment',10, 2)->nullable(false)->default(0.00);
            $table->decimal('amortization',10, 2)->nullable(false)->default(0.00);
            $table->decimal('condo_fees',10, 2)->nullable(false)->default(0.00);
            $table->decimal('down_payment',10, 2)->nullable(false)->default(0.00);
            $table->decimal('heat',10, 2)->nullable(false)->default(0.00);
            $table->decimal('home_price',10, 2)->nullable(false)->default(0.00);
            $table->decimal('mortgage',10, 2)->nullable(false)->default(0.00);
            $table->decimal('others_expenses',10, 2)->nullable(false)->default(0.00);
            $table->decimal('payment',10, 2)->nullable(false)->default(0.00);
            $table->decimal('property',10, 2)->nullable(false)->default(0.00);
            $table->decimal('rate',10, 2)->nullable(false)->default(0.00);
            $table->decimal('rental_income',10, 2)->nullable(false)->default(0.00);
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
        Schema::dropIfExists('leads');
    }
}

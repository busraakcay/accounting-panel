<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bill_id')->constrained('bills')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->double('quantity');
            $table->string('quantity_type');
            $table->double('unit_price');
            $table->double('discount_rateof_inc');
            $table->double('discount_inc_amount');
            $table->string('reasonfor_discount_inc')->nullable();
            $table->double('vat_rate');
            $table->double('vat_amount');
            $table->string('other_taxes')->nullable();
            $table->double('total_amount');
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
        Schema::dropIfExists('products');
    }
};

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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable()->constrained('companies')->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('branch_id')->constrained('branches')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('bill_type');
            $table->string('product_name');
            $table->integer('quantity');
            $table->string('quantity_type');
            $table->double('unit_price');
            $table->double('discount_rateof_inc');
            $table->double('discount_inc_amount');
            $table->string('reasonfor_discount_inc');
            $table->double('vat_rate');
            $table->double('vat_amount');
            $table->string('other_taxes');
            $table->double('total_amount');
            $table->datetime('bill_date');
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
        Schema::dropIfExists('bills');
    }
};

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
            $table->boolean('is_paid');
            $table->datetime('bill_date');
            $table->double('total_amount');
            $table->double('total_discount_inc_amount');
            $table->double('total_vat_amount');
            $table->double('total_amount_with_taxes');
            $table->double('total_paid_amount');
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

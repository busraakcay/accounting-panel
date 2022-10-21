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
        Schema::create('paid_debts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('debt_id')->constrained('debts')->onUpdate('cascade')->onDelete('cascade');
            $table->datetime('paid_date')->nullable();
            $table->double('paid_amount');
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
        Schema::dropIfExists('paid_debts');
    }
};

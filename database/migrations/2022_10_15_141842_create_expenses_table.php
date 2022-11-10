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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->nullable()->constrained('expense_types')->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('branch_id')->constrained('branches')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('bill_id')->nullable()->constrained('bills')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->double('amount');
            $table->datetime('date');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('expenses');
    }
};

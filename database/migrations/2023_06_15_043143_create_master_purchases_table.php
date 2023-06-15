<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_purchases', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('supplierId')->unsigned();
            $table->string('productName');
            $table->integer('unitPrice');
            $table->integer('qty');
            $table->dateTime('purchaseDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_purchases');
    }
};

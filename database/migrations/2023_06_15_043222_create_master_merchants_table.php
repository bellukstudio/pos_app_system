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
        Schema::create('master_merchants', function (Blueprint $table) {
            $table->id();
            $table->string('nameMerchant');
            $table->text('address');
            $table->bigInteger('categoryMerchantId')->unsigned();
            $table->string('founder');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_merchants');
    }
};

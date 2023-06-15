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
        Schema::create('master_promos', function (Blueprint $table) {
            $table->id();
            $table->string('promoName', 100);
            $table->string('code', 50);
            $table->decimal('discount', 5, 2);
            $table->dateTime('startedDate');
            $table->dateTime('expiredDate');
            $table->bigInteger('productId')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_promos');
    }
};

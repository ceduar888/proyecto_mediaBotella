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
        Schema::create('OrderDetail', function (Blueprint $table) {
            $table->id('id_order_detail');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_order');
            $table->bigInteger('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->timestamp('last_update')->useCurrentOnUpdate()->nullable();
            /**Foreigns */
            $table->foreign('id_product')->references('id_product')->on('Product')->cascadeOnUpdate()->noActionOnDelete();
            $table->foreign('id_order')->references('id_order')->on('Order')->cascadeOnUpdate()->noActionOnDelete();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('OrderDetail');
    }
};

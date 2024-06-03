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
        Schema::create('Purchasing', function (Blueprint $table) {
            $table->id('id_purchasing');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_supplier');
            $table->bigInteger('quantity');
            $table->decimal('price', 10, 2);
            $table->dateTime('create_date')->useCurrent();
            $table->timestamp('last_update')->useCurrentOnUpdate()->nullable();
            /**Foreigns */
            $table->foreign('id_product')->references('id_product')->on('Product')->cascadeOnUpdate()->noActionOnDelete();
            $table->foreign('id_supplier')->references('id_supplier')->on('Supplier')->cascadeOnUpdate()->noActionOnDelete();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Purchasing');
    }
};

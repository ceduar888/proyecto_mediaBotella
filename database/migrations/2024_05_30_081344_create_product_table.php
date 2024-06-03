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
        Schema::create('Product', function (Blueprint $table) {
            $table->id('id_product');
            $table->unsignedBigInteger('id_category');
            $table->string('name', 150)->unique();
            $table->string('code', 20)->unique();
            $table->string('description', 200);
            $table->string('img', 100);
            $table->dateTime('create_date')->useCurrent();
            $table->timestamp('last_update')->useCurrentOnUpdate()->nullable();
            /**Foreigns */
            $table->foreign('id_category')->references('id_category')->on('Category')->cascadeOnUpdate()->noActionOnDelete();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Product');
    }
};

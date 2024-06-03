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
        Schema::create('Order', function (Blueprint $table) {
            $table->id('id_order');
            $table->unsignedBigInteger('id_user');
            $table->decimal('total', 10, 2);
            $table->string('status', 20);
            $table->string('delivery_address', 250);
            $table->dateTime('create_date')->useCurrent();
            $table->timestamp('last_update')->useCurrentOnUpdate()->nullable();
            /**Foreigns */
            $table->foreign('id_user')->references('id')->on('users')->cascadeOnUpdate()->noActionOnDelete();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Order');
    }
};

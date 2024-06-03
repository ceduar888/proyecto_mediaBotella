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
        Schema::create('Supplier', function (Blueprint $table) {
            $table->id('id_supplier');
            $table->string('name', 80)->unique();
            $table->string('address', 200);
            $table->string('phone', 20);
            $table->dateTime('create_date')->useCurrent();
            $table->timestamp('last_update')->useCurrentOnUpdate()->nullable();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Supplier');
    }
};

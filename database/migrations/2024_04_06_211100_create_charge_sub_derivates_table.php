<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('charge_sub_derivates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('charge_derivate_id')->constrained();
            $table->string('name');
            $table->float('kw');
            $table->float('a');
            $table->string('brand');
            $table->string('model');
            $table->string('capacity');
            $table->string('location')->nullable();
            $table->float('lightning_discharge');
            $table->float('surge');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charge_sub_derivates');
    }
};

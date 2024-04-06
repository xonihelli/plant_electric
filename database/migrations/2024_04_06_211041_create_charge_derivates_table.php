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
        Schema::create('charge_derivates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('electric_charge_id')->constrained();
            $table->string('name_technical')->nullable();
            $table->string('name');
            $table->float('kw');
            $table->float('a');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charge_derivates');
    }
};

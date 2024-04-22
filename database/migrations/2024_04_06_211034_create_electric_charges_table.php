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
        Schema::create('electric_charges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained();
            $table->string('name');
            $table->float('kw');
            $table->float('a');
            $table->date('measurement_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electric_charges');
    }
};

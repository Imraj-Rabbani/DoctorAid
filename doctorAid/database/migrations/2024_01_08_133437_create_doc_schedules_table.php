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
        Schema::create('doc_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doc_id');
            $table->foreign('doc_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->string('day');
            $table->string('time');
            $table->integer('seat_left')->default(5);
            $table->string('fees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_schedules');
    }
};

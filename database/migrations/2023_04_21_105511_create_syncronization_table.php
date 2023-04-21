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
        Schema::create('syncronization', function (Blueprint $table) {
            $table->id();
            $table->foreignId('channel_id')->constrained('channel');
            $table->foreignId('reservation_id')->constrained('reservation');
            $table->string('message_sent');
            $table->string('message_received');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syncronization');
    }
};

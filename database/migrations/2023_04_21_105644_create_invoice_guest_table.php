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
        Schema::create('invoice_guest', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guest_id')->constrained('guest');
            $table->foreignId('reservation_id')->constrained('reservation');
            $table->decimal('invoice_amount', 10, 2);
            $table->time('issued');
            $table->time('paid');
            $table->string('canceled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_guest');
    }
};

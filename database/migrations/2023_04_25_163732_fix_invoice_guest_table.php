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
        // xoa khoa ngoai cua bang invoice_guest
        Schema::table('invoice_guest', function (Blueprint $table) {
            $table->dropForeign('invoice_guest_guest_id_foreign');
        });
        // xoa cot guest_id cua bang invoice_guest
        Schema::table('invoice_guest', function (Blueprint $table) {
            $table->dropColumn('guest_id');
        });
        Schema::table('invoice_guest', function (Blueprint $table) {
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade')->after('id');
        });
        // xoa khoa ngoai va cot cua bang invoice_guest la users_id
        // Schema::table('invoice_guest', function (Blueprint $table) {
        //     $table->dropForeign('invoice_guest_users_id_foreign');
        //     $table->dropColumn('users_id');
        // });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};

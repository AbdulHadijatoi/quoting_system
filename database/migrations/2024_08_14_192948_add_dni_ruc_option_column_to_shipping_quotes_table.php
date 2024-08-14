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
        Schema::table('shipping_quotes', function (Blueprint $table) {
            $table->string('dni_ruc_option')->nullable()->after('guest_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipping_quotes', function (Blueprint $table) {
            $table->dropColumn(['dni_ruc_option']);
        });
    }
};

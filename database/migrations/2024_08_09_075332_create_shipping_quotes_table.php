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
        Schema::create('shipping_quotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // For employees, nullable for guest users
            $table->string('guest_name')->nullable(); // Name of the guest user
            $table->string('dni_or_ruc_value')->nullable(); // Name of the guest user
            $table->string('guest_email')->nullable(); // Email of the guest user
            $table->string('guest_phone')->nullable(); // Email of the guest user
            $table->string('guest_address')->nullable(); // Email of the guest user
            $table->string('quote_reference')->unique(); // Unique reference for each quote
            $table->timestamp('valid_until'); // Validity period of the quote
            $table->decimal('total_cost', 10, 2); // Total cost of the quote
            $table->boolean('generated_by_employee')->default(false); // To differentiate if generated by employee
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_quotes');
    }
};

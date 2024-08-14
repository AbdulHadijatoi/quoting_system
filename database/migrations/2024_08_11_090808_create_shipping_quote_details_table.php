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
        Schema::create('shipping_quote_details', function (Blueprint $table) {
            $table->id();
            $table->string('volume')->nullable()->comment('volumen');
            $table->foreignId('shipping_quote_id')->constrained('shipping_quotes')->onDelete('cascade');
            $table->string('total_weight')->nullable()->comment('peso_total');
            $table->string('invoice_price')->nullable()->comment('precio_factura');
            $table->boolean('first_import')->default(false)->comment('primera_importacion');
            $table->foreignId('type_of_merchandise')->constrained('merchandise_types')->onDelete('cascade');
            $table->string('origin_port');
            $table->string('incoterm');
            $table->foreignId('destination_location')->constrained('destination_locations')->onDelete('cascade');
            $table->string('measurement_unit')->nullable();
            // type_of_merchandise => tipo_mercancia
            // port_of_origin => puerto_origen
            // incoterm => incoterm
            // destination_location => ubicacion_destino
            // unit_of_measurement=> unidad_de_medida
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_details');
    }
};

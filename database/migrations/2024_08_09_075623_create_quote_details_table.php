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
        Schema::create('quote_details', function (Blueprint $table) {
            $table->id();
            $table->string('volume')->nullable()->comment('volumen');
            $table->string('total_weight')->nullable()->comment('peso_total');
            $table->string('invoice_price')->nullable()->comment('precio_factura');
            $table->string('type_of_merchandise')->nullable()->comment('tipo_mercancia');
            $table->string('first_import')->nullable()->comment('primera_importacion');
            $table->string('port_of_origin')->nullable()->comment('puerto_origen');
            $table->string('incoterm')->nullable()->comment('incoterm');
            $table->string('destination_location')->nullable()->comment('ubicacion_destino');
            // FOR FCL ONLLY
            $table->string('unit_of_measurement')->nullable()->comment('unidad_de_medida_teu');
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

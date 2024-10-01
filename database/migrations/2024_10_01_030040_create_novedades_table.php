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
        Schema::create('novedades', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->date("fecha");
            $table->string("direccion");
            $table->integer("longitud");
            $table->integer("latitud");
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('afiliado_id');
            $table->unsignedBigInteger('tpnovedades_id');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->foreign('tpnovedades_id')->references('id')->on('tipo_novedades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('novedades');
    }
};

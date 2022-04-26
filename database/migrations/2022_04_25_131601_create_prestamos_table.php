<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cliente')->references('id')->on('clientes')->comment('El ID del cliente que cogio el prestamo');
            $table->double('importe_de_credito', 8, 2);
            $table->double('tasa_de_interes', 8, 2);
            $table->integer('numero_de_cuotas');
            $table->double('importe_de_cuotas', 8, 2);
            $table->double('total_a_pagar', 8, 2);
            $table->double('interes_generado', 8, 2);
            $table->date('fecha_de_inicio');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
};

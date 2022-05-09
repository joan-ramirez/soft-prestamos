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
        Schema::create('fecha_inicio_app', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio_app')->comment('La fecha que inicio la aplicacion web o mas bien cuando sea ejecuto el seeder del mismo, esta fecha sirve para obtener los años de las estadistica.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fecha_inicio_app');
    }
};

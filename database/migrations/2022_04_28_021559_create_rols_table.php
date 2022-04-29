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
        Schema::create('rols', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();;
            $table->string('descripcion');
            $table->timestamps();
        });

        Schema::create('user_rols', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rol')->references('id')->on('rols')->comment('El id del rol');
            $table->foreignId('id_user')->references('id')->on('users')->comment('El id del usuario que le pertenece cierto rol');
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
        Schema::dropIfExists('rols');
        Schema::dropIfExists('user_rols');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RegistroCuentasBancarias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_cuentas_bancarias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cuenta_destino');
            $table->foreignId('id_usuario_origen')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_usuario_destino')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('registro_cuentas_bancarias');
    }
}

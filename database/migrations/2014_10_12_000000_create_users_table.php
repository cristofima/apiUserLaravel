<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('cedula_us', 10)->unique();
            $table->string('nombres_us', 25);
            $table->string('apellidos_us', 25);
            $table->date('fecha_nacimiento_us');
            $table->string('telefono_us', 10);
            $table->string('codigo_postal_us', 8);
            $table->string('pais_us', 20);
            $table->string('provincia_us', 25);
            $table->string('ciudad_us', 25);
            $table->string('calle_uno_us', 40);
            $table->string('calle_dos_us', 40);
            $table->string('referencia_us', 30);
            $table->integer('numero_casa_us');
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
        Schema::dropIfExists('users');
    }
}

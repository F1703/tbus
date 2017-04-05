<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioNsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('horario_ns', function(Blueprint $table) {
            $table->increments('id');
            $table->string('hora_ns');
						$table->integer('idservicio')->unsigned();
						$table->integer('idparada')->unsigned();
						$table->integer('idtipo')->unsigned();


						$table->foreign('idservicio')->references('idservicio')->on('servicio')->onDelete('cascade');
						$table->foreign('idparada')->references('idparada')->on('parada')->onDelete('cascade');
						$table->foreign('idtipo')->references('idtipo')->on('tipo')->onDelete('cascade');

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
		Schema::drop('horario_ns');
	}

}

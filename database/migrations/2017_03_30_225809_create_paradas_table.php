<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParadasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parada', function(Blueprint $table) {
            $table->increments('idparada');
            $table->string('parada');
						$table->integer('idlocalidad')->unsigned();
            $table->timestamps();

						$table->foreign('idlocalidad')->references('idlocalidad')->on('localidad')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('parada');
	}

}

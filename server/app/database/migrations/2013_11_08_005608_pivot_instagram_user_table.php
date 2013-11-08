<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotInstagramUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instagram_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('instagram_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('instagram_id')->references('id')->on('instagrams')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instagram_user');
	}

}

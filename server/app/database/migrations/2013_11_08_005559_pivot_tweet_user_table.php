<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotTweetUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tweet_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('tweet_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('tweet_id')->references('id')->on('tweets')->onDelete('cascade');
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
		Schema::drop('tweet_user');
	}

}

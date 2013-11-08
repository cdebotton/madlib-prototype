<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotProjectTweetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_tweet', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('project_id')->unsigned()->index();
			$table->integer('tweet_id')->unsigned()->index();
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_tweet');
	}

}

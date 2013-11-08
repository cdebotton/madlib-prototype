<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotInstagramProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instagram_project', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('instagram_id')->unsigned()->index();
			$table->integer('project_id')->unsigned()->index();
			$table->foreign('instagram_id')->references('id')->on('instagrams')->onDelete('cascade');
			$table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instagram_project');
	}

}

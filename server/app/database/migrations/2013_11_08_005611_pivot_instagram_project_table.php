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

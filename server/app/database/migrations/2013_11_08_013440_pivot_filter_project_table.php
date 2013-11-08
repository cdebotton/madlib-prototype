<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotFilterProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('filter_project', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('filter_id')->unsigned()->index();
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
		Schema::drop('filter_project');
	}

}

<?php

class ProjectsFiltersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('filter_project')->truncate();

		$filter_project = [
      [
        'id' => 1,
        'filter_id' => 1,
        'project_id' => 1
      ]
    ];

		// Uncomment the below to run the seeder
		DB::table('filter_project')->insert($filter_project);
	}

}

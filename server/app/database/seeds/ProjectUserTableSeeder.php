<?php

class ProjectUserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('project_user')->truncate();

		$project_user = [
      [
        'id' => 1,
        'project_id' => 1,
        'user_id' => 1
      ],
      [
        'id' => 2,
        'project_id' => 2,
        'user_id' => 2
      ],
      [
        'id' => 3,
        'project_id' => 3,
        'user_id' => 3
      ],
      [
        'id' => 4,
        'project_id' => 2,
        'user_id' => 1
      ],
    ];

		// Uncomment the below to run the seeder
		DB::table('project_user')->insert($project_user);
	}

}

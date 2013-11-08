<?php

class ProjectsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('projects')->truncate();

		$projects = [
      [
        'id' => 1,
        'title' => 'Dumbo Townhouses',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 2,
        'title' => 'Gary Hutswit Films',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 3,
        'title' => 'Gucci',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 4,
        'title' => 'Hunt Library',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 5,
        'title' => '185 Plymouth',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ]
    ];

		// Uncomment the below to run the seeder
		DB::table('projects')->insert($projects);
	}

}

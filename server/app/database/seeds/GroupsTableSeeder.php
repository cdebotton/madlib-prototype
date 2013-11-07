<?php

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('groups')->truncate();

		$filtergroups = [
      [
        'id' => 1,
        'title' => 'viewers',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 2,
        'title' => 'work',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 3,
        'title' => 'team',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 4,
        'title' => 'culture',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 5,
        'title' => 'misc',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ]
    ];

		// Uncomment the below to run the seeder
		DB::table('groups')->insert($filtergroups);
	}

}

<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->truncate();

		$users = [
      [
        'id' => 1,
        'email' => 'debotton@brooklynunited.com',
        'avatar' => 'debotton.jpeg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 2,
        'email' => 'goodhue@brooklynunited.com',
        'avatar' => 'goodhue.jpeg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 3,
        'email' => 'sarsfield@brooklynunited.com',
        'avatar' => 'sarsfield.jpeg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ]
    ];

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}

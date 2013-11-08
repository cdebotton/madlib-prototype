<?php

class MediaTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('media')->truncate();

		$media = [
      [
        'id' => 1,
        'project_id' => 1,
        'filename' => 'dh-1.jpg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 2,
        'project_id' => 1,
        'filename' => 'dh-2.jpg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 3,
        'project_id' => 1,
        'filename' => 'dh-3.jpg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 4,
        'project_id' => 1,
        'filename' => 'dh-4.jpg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 5,
        'project_id' => 1,
        'filename' => 'dh-5.jpg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 6,
        'project_id' => 2,
        'filename' => 'hunt-1.jpg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 7,
        'project_id' => 2,
        'filename' => 'hunt-2.jpg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 8,
        'project_id' => 2,
        'filename' => 'hunt-3.jpg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 9,
        'project_id' => 2,
        'filename' => 'hunt-4.jpg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 10,
        'project_id' => 3,
        'filename' => '185-1.jpg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 11,
        'project_id' => 3,
        'filename' => '185-2.jpg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 12,
        'project_id' => 3,
        'filename' => '185-3.jpg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 13,
        'project_id' => 3,
        'filename' => '185-4.jpg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 14,
        'project_id' => 3,
        'filename' => '185-5.jpg',
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
    ];

		// Uncomment the below to run the seeder
		DB::table('media')->insert($media);
	}

}

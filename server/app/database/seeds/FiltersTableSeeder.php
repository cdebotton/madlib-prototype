<?php

class FiltersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('filters')->truncate();

		$filters = [
      [
        'id' => 1,
        'title' => 'potential client',
        'group_id' => 1,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
      [
        'id' => 2,
        'title' => 'curious individual',
        'group_id' => 1,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 3,
        'title' => 'potential employee',
        'group_id' => 1,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 4,
        'title' => 'all our work',
        'group_id' => 2,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 5,
        'title' => 'our video work',
        'group_id' => 2,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 6,
        'title' => 'our interative work',
        'group_id' => 2,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 7,
        'title' => 'our branding work',
        'group_id' => 2,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 8,
        'title' => 'our campaign work',
        'group_id' => 2,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 9,
        'title' => 'the whole team',
        'group_id' => 3,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 10,
        'title' => 'the development team',
        'group_id' => 3,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 11,
        'title' => 'the design team',
        'group_id' => 3,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 12,
        'title' => 'the partners',
        'group_id' => 3,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 13,
        'title' => 'office view',
        'group_id' => 4,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 14,
        'title' => 'capabilities',
        'group_id' => 4,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 15,
        'title' => 'relaxing time',
        'group_id' => 4,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 16,
        'title' => 'neighborhood',
        'group_id' => 4,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 17,
        'title' => 'oscar',
        'group_id' => 5,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],[
        'id' => 18,
        'title' => 'playlist',
        'group_id' => 5,
        'created_at' => DB::raw('NOW()'),
        'updated_at' => DB::raw('NOW()'),
      ],
    ];

		// Uncomment the below to run the seeder
		DB::table('filters')->insert($filters);
	}

}

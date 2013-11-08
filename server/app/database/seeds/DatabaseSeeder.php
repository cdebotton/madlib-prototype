<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('FiltersTableSeeder');
		$this->call('GroupsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('MediaTableSeeder');
		$this->call('TweetsTableSeeder');
		$this->call('InstagramsTableSeeder');
		$this->call('ProjectsTableSeeder');
		$this->call('Instagram_projectTableSeeder');
		$this->call('Instagram_userTableSeeder');
		$this->call('Project_tweetTableSeeder');
		$this->call('Project_userTableSeeder');
		$this->call('Tweet_userTableSeeder');
	}

}

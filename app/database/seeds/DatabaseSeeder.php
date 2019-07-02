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

		 $this->call('UserTableSeeder');
	}

}
class UserTableSeeder extends Seeder {
	
	public function run()
	{
		$users = User::get();
		
		if($users->count() == 0) {
			User::create(array(
				'email' => 'gedeson.wasley@gmail.com',
				'password' => Hash::make('password'),
				'name'  => 'Gedeson',
				'country' => 2,
				'role'  => 1
			));
		}
	}
}
	

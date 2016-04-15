<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		$users = [
        [
            'name' => 'Super Admin',
			'username' => 'admin',
			'email' => 'admin@admin.com',
			'password' => bcrypt('admin'),
			'confirmed' => 1,
            'admin' => 1,
			'confirmation_code' => md5(microtime() . env('APP_KEY'))
		], 
		[
            'name' => 'Rowland Mtetezi',
			'username' => 'rowlandmtetezi',
			'email' => 'rowlandmtetezi@rmail.com',
			'password' => bcrypt('i82april'),
			'confirmed' => 1,
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		],
		[
            'name' => 'Test User',
			'username' => 'testuser',
			'email' => 'testuser@testuser.com',
			'password' => bcrypt('testuser'),
			'confirmed' => 0,
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]
		];

		foreach ($users as $user) 
        {
           \App\User::create($user);
        }
	}

}

<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 5) as $index)
		{
			User::create([
				'username' => $faker->userName(),
				'password' => Hash::make('123456'),
				'user_type' => $faker->word(),
				'employee_id' => rand(1,10)
			]);
		}
	}

}
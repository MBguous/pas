<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Employee::create([
				'first_name' => $faker->firstName(),
				'last_name' => $faker->lastName(),
				'email' => $faker->email(),
				'phone' => $faker->phoneNumber(),
				'address' => $faker->address(),
				'hire_date' => $faker->dateTimeThisDecade(),
				'employment_type' => $faker->word(),
				'marital_status' => $faker->boolean($chanceOfGettingTrue = 50)
			]);
		}
	}

}
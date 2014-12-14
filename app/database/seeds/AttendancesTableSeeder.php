<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AttendancesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Attendance::create([
				'date' => $faker->date(),
				'clock_in' => $faker->time(),
				'clock_out' => $faker->time(),
				'status' => $faker->word(),
				'employee_id' => rand(1,10)
			]);
		}
	}

}
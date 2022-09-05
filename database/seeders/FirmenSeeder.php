<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Firmen;

class FirmenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// make instance of the Faker-class
		$faker = \Faker\Factory::create();

		// insert some random generated records
		for ($i = 0; $i < 10; $i++) {
			Firmen::create([
				'firmenname' => $faker->sentence(),
			]);
		}
    }
}

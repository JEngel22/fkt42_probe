<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Mitarbeiter;

class MitarbeiterSeeder extends Seeder
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
		$firmen = DB::table('firmen')->get();
        foreach($firmen as $firma) {
            for ($j = 0;$j<10;$j++) {
                Mitarbeiter::create([
                    'firmen_id' => $firma->id,
                    'vorname' => $faker->firstName,
                    'nachname' => $faker->lastName,
                    'email' => $faker->email,
                ]);
            }
		}
    }
}

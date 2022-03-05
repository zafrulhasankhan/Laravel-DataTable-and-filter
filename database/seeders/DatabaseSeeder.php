<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();

        $gender = $faker->randomElement(['male', 'female']);

    	foreach (range(1,50) as $index) {
            DB::table('teachers')->insert([
                'firstname' => $faker->name($gender),
                'lastname' => $faker->name($gender),
                'email' => $faker->email,
                'salary' => $faker->randomDigit(),
                
            ]);
        }
    }
    
}

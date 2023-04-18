<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        for ($i = 0; $i < 10; $i++) {
            DB::table('city')->insert([
                'city_name' => $faker->city,
                'postal_code' => $faker->postcode,
                'country_id' => 201,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

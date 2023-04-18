<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        for ($i = 0; $i < 100; $i++) {
            DB::table('country')->insert([
                'country_name' => $faker->unique()->country,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

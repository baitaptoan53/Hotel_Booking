<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $faker = Faker::create('vi_VN');

        for ($i = 0; $i < 100; $i++) {
            DB::table('room_reserved')->insert([
                'room_id' => $faker->unique()->numberBetween(1, 100),
                'price' => $faker->numberBetween(1000000, 10000000),
            ]);
        }
    }
}

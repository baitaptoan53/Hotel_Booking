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
        // $faker = Faker::create('vi_VN');

        // for ($i = 0; $i < 100; $i++) {
        //     DB::table('room_reserved')->insert([
        //         'room_id' => $faker->unique()->numberBetween(1, 100),
        //         'price' => $faker->numberBetween(1000000, 10000000),

        // $faker = Faker::create('vi_VN');
        // for ($i = 0; $i < 100; $i++) {
        //     DB::table('plant')->insert([
        //         'plant_name' => $faker->unique()->name,
        //         'details' => $faker->text,
        //         'room_min' => $faker->numberBetween(1, 10),
        //         'room_max' => $faker->numberBetween(100, 200),
        //         'monthly_price' => $faker->numberBetween(100, 9999),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
        // for($i = 0; $i < 100; $i++){
        //     DB::table('company')->insert([
        //         'company_name' => $faker->unique()->company,
        //         'company_address' => $faker->address,
        //         'email' => $faker->unique()->email,
        //         'VAT_ID' => $faker->unique()->numberBetween(1000000000, 9999999999),
        //         'city_id' => $faker->numberBetween(1, 10),
        //         'details' => $faker->text,
        //         'is_active' => $faker->boolean,
        //         'created_at' => now(),
        //         'updated_at' => now(),

        //     ]);
        // }
        // for($i = 0; $i < 100; $i++){
        //     DB::table('hotel')->insert([
        //         'hotel_name' => $faker->unique()->company,
        //         'description' => $faker->text,
        //         'company_id' => $faker->numberBetween(1, 100),
        //         'city_id' => $faker->numberBetween(1, 10),
        //         'category_id' => $faker->numberBetween(1, 2),
        //         'is_active' => $faker->boolean,
        //         'created_at' => now(),
        //         'updated_at' => now(),


        //     ]);
    }
    // }
    // }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Thesis;
use DeepCopy\TypeFilter\ReplaceFilter;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        for ($i = 1; $i < 100; $i++) {
            DB::table('users')->insert([
                'id' => $i,
                'name' => $faker->name(),
                'phone' => $faker->phoneNumber(),
                'user_role_id' => random_int(1, 3),
                'user_faculty_id' => random_int(1, 12),
                'email' => $faker->companyEmail(),
                'password' => Hash::make('password'),
            ]);
        }
    }
}

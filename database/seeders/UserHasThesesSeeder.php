<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Thesis;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserHasThesesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        for ($i = 100; $i < 1000; $i++) {
            DB::table('user_has_theses')->insert([
                'id' => $i,
                'user_id' => random_int(1, 99),
                'thesis_id' => random_int(1, 199),
            ]);
        }
    }
}

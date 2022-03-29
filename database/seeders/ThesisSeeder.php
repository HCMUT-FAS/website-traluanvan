<?php

namespace Database\Seeders;

use App\Models\Thesis;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ThesisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        for ($i = 0; $i < 200; $i++) {
            DB::table('theses')->insert([
                'id' => $i,
                'nameVN' => $faker->text,
                'nameEN' => $faker->text,
                'student1' => $faker->name,
                'student2' => $faker->name,
                'description' => $faker->text,
                'thesis_status_id' => random_int(1, 3),
                'thesis_role_id' => random_int(1, 3),
            ]);
        }
    }
}

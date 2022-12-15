<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CitySeeder::class,
            DistrictSeeder::class,
            VillageSeeder::class,
            FileSeeder::class,
            // QuestionaireSeeder::class,
            
        ]);
        // \App\Models\User::factory(10)->create();
    }
}

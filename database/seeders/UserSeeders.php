<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Model\User;
use App\Models\User as ModelsUser;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           
        $faker = Faker::create();
        $matricules = "089356";
        for ($i = 0; $i < 40; $i++) {
            $matricule = $matricules . $i;
            ModelsUser::create([
                'nom' => $faker->name,
                'prenom' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('123456')
            ]);
        }
    }
}

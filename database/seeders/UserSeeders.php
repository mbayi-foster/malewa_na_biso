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
        for ($i = 0; $i < 40; $i++) {
            ModelsUser::create([
                'nom' => $faker->name,
                'email' => $faker->email,
                'phone'=>  $faker->phoneNumber,
                'to_paye'=> 3000000,
                'password' => bcrypt('123456')
            ]);
        }
    }
}

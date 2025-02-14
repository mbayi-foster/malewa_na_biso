<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(["nom"=> "Administrateur"]);
        Role::create(["nom"=> "Comptable"]);
        Role::create(["nom"=> "PDG"]);
    }
}

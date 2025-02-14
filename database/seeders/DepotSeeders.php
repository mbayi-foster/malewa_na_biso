<?php

namespace Database\Seeders;

use App\Models\Depot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class DepotSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 25; $i++) {
            Depot::create([
                'partenaire'=>rand(1,4),
                'ref'=>"CDPF".rand(1,4)."TG".rand(1,4)."DF".rand(1,10),
                'montant'=>30000,
                "date_depot"=>Date::now()->format("Y-m-d"),
                "photo"=> "photo_$i",
            ]);
        }
    }
}

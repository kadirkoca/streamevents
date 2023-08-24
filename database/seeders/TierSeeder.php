<?php

namespace Database\Seeders;

use App\Models\Tier;
use Illuminate\Database\Seeder;

class TierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prices = [5, 10, 15];
        for($i = 1; $i<=count($prices); $i++){
            Tier::create([
                'name' => "Tier$i",
                'price' => $prices[$i-1],
            ]);
        }
    }
}

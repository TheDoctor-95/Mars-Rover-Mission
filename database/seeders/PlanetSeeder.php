<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Planet;

class PlanetSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {
        //
        Planet::factory()->create( [
            'x' => 75,
            'y' => 75
        ] );

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rover::factory()->create( [
                'x' => rand( 0, 75 ),
                'y' => rand( 0, 75 ),
                'planet_id' => 1
            ] );
    }
}

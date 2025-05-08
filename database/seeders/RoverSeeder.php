<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rover;

class RoverSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {

        Rover::factory()->create( [
            'x_initial' => rand( 0, 75 ),
            'y_initial' => rand( 0, 75 ),
            'direction_initial' => Rover::$DIRECTIONS[ rand( 0, 3 ) ],
            'planet_id' => 1
        ] );
    }
}

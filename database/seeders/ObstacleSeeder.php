<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Obstacle;

class ObstacleSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {
        //

        //*WE WILL GENERATE A RANDOM NUMBER OF OBSTACLES FOR THIS EXERCISE*/
        for ( $i = 0; $i < rand( 200, 1000 );
        $i++ ) {
            Obstacle::factory()->create( [
                'x' => rand( 0, 75 ),
                'y' => rand( 0, 75 ),
                'planet_id' => 1
            ] );
        }
    }
}

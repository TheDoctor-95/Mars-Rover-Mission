<?php

namespace App\Http\Controllers;

use App\Models\Obstacle;
use Illuminate\Http\Request;

class ObstacleController extends Controller {
    /*TODO HERE WE WOULD LIKE TO HAVE A BASIC CRUD SO THE SENSORS COULD REGISTER THE OBSTACLES DETECTED
    FOR THIS EXERCISE WE WILL SIMULATE IT ALREADY HAVING THE OBSTACLES LOCATIONS IN THE DATABASE AND CONSULTING IT
    */

    /**
    * Return all obstacles from a planet to draw them on the map
    */

    public function getAllObstacles( $planet_id ) {
        return Obstacle::planet( $planet_id )->get();
    }

    /**
    * Check if there is an obstacle in the current position
    */

    public static function isObstacle( $planet_id, $x, $y ) {
        return Obstacle::location( $planet_id, $x, $y )->exists();
    }

}

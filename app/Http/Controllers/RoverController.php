<?php

namespace App\Http\Controllers;

use App\Models\Rover;
use Illuminate\Http\Request;

class RoverController extends Controller {
    //TODO IF WE WOULD LIKE TO HAVE MULTIPLE ROVERS WE WOULD ADD THE BASIC CRUD HERE

    public function getRover( $planet_id ) {
        //FOR THIS TEST WE'LL RETURN THE FIRST. IF WE NEED MORE WE'LL SEARCH IT FOR ID

        return Rover::planet( $planet_id )->first();

    }
}

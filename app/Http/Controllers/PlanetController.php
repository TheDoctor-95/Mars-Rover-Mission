<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller {
    //TODO IF WE WANT TO HAVE MULTIPLE PLANETS WITH DIFERENT CONDITIONS WE WOULD ADD THE BASIC CRUD HERE

    //WHILE THERE IS NO CRUD AND ONLY 1 PLANET IN THE DATABASE WE WILL RETURN ONLY THE FIRST

    public function getPlanet() {
        return Planet::first();
    }
}

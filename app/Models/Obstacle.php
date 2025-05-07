<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obstacle extends Model {
    /** @use HasFactory<\Database\Factories\ObstacleFactory> */
    use HasFactory;

    public function scopePlanet( $query, $planet_id ) {
        $query->where( 'planet_id', $planet_id );
    }

    public function scopeLocation( $query, $planet_id, $x, $y ) {
        $query->planet( $planet_id );
        $query->where( 'x', $x );
        $query->where( 'y', $y );
    }
}

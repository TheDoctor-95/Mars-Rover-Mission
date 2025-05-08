<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rover extends Model {
    /** @use HasFactory<\Database\Factories\RoverFactory> */
    use HasFactory;

    static public $DIRECTIONS = [ 'N', 'E', 'S', 'W' ];

    public function scopePlanet( $query, $planet_id ) {
        $query->where( 'planet_id', $planet_id );
    }

    protected $appends = [ 'x', 'y', 'direction' ];

    public function getXAttribute() {
        if ( count( $this->movements ) )
        return $this->movements()->lastDone()->first()->x;

        return $this->x_initial;
    }

    public function getYAttribute() {
        if ( count( $this->movements ) ) return $this->movements()->lastDone()->first()->y;
        return $this->y_initial;
    }

    public function getDirectionAttribute() {
        if ( count( $this->movements ) ) return $this->movements()->lastDone()->first()->direction;
        return $this->direction_initial;
    }

    public function movements() {
        return $this->hasMany( Movement::class );
    }
}

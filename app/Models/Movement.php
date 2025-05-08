<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model {
    protected $guarded = [ 'id' ];
    /** @use HasFactory<\Database\Factories\MovementFactory> */
    use HasFactory;

    public function scopePlanet( $query, $planet_id ) {
        $query->where( 'planet_id', $planet_id );
    }

    public function scopeRover( $query, $rover_id ) {
        $query->where( 'rover_id', $rover_id );
    }

    public function scopeLastDone( $query ) {
        $query->orderBy( 'created_at', 'desc' )
        ->orderBy( 'id', 'desc' );
    }

}

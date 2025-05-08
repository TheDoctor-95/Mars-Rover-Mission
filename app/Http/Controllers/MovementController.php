<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\Rover;
use App\Models\Planet;
use Illuminate\Http\Request;

class MovementController extends Controller {
    /**
    * GET ALL MOVEMENTS FROM A ROVER
    */

    public function getMovements( $planet_id, $rover_id ) {
        return Movement::planet( $planet_id )->rover( $rover_id )->lastDone()->get();
    }

    public function executeCommand( $planet_id, $rover_id ) {
        $command = request( 'command' );

        //IN CASE OF FINDING AND OBJECT WE WILL SET IT TO FALSE SO THE COMAND STOPS
        $keepGoing = true;
        for ( $i = 0; $i < strlen( $command );
        $i++ && $keepGoing ) {
            $keepGoing = $this->executeMovement( $planet_id, $rover_id, $command[ $i ] );
            if ( !$keepGoing ) return;

        }

        return [ 'success' => true ];
    }

    public function executeMovement( $planet_id, $rover_id, $movement ) {
        $keepGoing = true;
        $rover = Rover::find( $rover_id );
        $planet = Planet::find( $planet_id );
        $x = $rover->x;
        $y = $rover->y;
        $direction = $rover->direction;
        $status = 'ok';
        switch ( $movement ) {
            case 'F':
            //MOVE FORWARD
            switch( $direction ) {
                //DEPENDING OF DIRECTION WELL MAKE THE NECESARI CONFIRMATIONS BEFORE MOVING
                case 'E':
                if ( $x+1 >= $planet->x ) {
                    $status = 'ERROR: END OF PLANET';
                    $keepGoing = false;
                } else if ( ObstacleController::isObstacle( $planet_id, $x+1, $y ) ) {
                    $status = 'ERROR: OBSTACLE DETECTED';
                    $keepGoing = false;
                } else {
                    $x++;
                }

                break;
                case 'W':
                if ( $x-1 <= 0 ) {
                    $status = 'ERROR: END OF PLANET';
                    $keepGoing = false;
                } else if ( ObstacleController::isObstacle( $planet_id, $x-1, $y ) ) {
                    $status = 'ERROR: OBSTACLE DETECTED';
                    $keepGoing = false;
                } else {
                    $x--;
                }
                break;
                case 'S':
                if ( $y+1 >= $planet->y ) {
                    $status = 'ERROR: END OF PLANET';
                    $keepGoing = false;
                } else if ( ObstacleController::isObstacle( $planet_id, $x, $y+1 ) ) {
                    $status = 'ERROR: OBSTACLE DETECTED';
                    $keepGoing = false;
                } else {
                    $y++;
                }

                break;
                case 'N':
                if ( $y-1 <= 0 ) {
                    $status = 'ERROR: END OF PLANET';
                    $keepGoing = false;
                } else if ( ObstacleController::isObstacle( $planet_id, $x, $y-1 ) ) {
                    $status = 'ERROR: OBSTACLE DETECTED';
                    $keepGoing = false;
                } else {
                    $y--;
                }
                break;

            }
            break;
            case 'L':
            //TURN LEFT
            $direction = $this->changeDirection( $rover->direction, -1 );

            break;
            case 'R':
            //TURN RIGHT
            $direction = $this->changeDirection( $rover->direction, +1 );
            break;
            default:
            //UNDEFINED COMAND
            $keepGoing = false;
            $status = 'error: COMMAND UNDEFINED';

        }

        Movement::create( [
            'command_executed' => $movement,
            'status' => $status,
            'x' => $x,
            'y' => $y,
            'direction' => $direction,
            'planet_id' => $planet_id,
            'rover_id' => $rover_id,
        ] );

        return $keepGoing;
    }

    public function changeDirection( $current_direction, $turn ) {

        $index = array_search( $current_direction, Rover::$DIRECTIONS );
        var_dump( $current_direction );
        var_dump( $index );
        $index += $turn;
        var_dump( $index );

        if ( $index<0 ) {
            $index += COUNT( Rover::$DIRECTIONS );
        }
        var_dump( $index );
        var_dump( $index%count( Rover::$DIRECTIONS ) );
        var_dump( Rover::$DIRECTIONS[ $index%count( Rover::$DIRECTIONS ) ] );
        return Rover::$DIRECTIONS[ $index%count( Rover::$DIRECTIONS ) ];

    }

}

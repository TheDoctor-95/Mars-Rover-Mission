# MARS ROVER MISSION

## TASK
You’re part of the team that explores Mars by sending remotely controlled vehicles to the surface
of the planet. Develop a software that translates the commands sent from earth to instructions
that are understood by the rover.

## REQUIREMENTS

- You are given the initial starting point (x,y) of a rover and the direction (N,S,E,W) it is facing.
- The rover receives a collection of commands. (E.g.) FFRRFFFRL
- The rover can move forward (f).
- The rover can move left/right (l,r).
- Suppose we are on a really weird planet that is square. 200x200 for example :)
- Implement obstacle detection before each move to a new square. If a given sequence of commands encounters an obstacle, the rover moves up to the last possible point, aborts the sequence and reports the obstacle.


## EXECUTE THE CODE

You should have the following versions in order to execute the code without any problem

- __php__: 8.4.6
- __node__: 23.11.0
- __mysql__: 8.0

To be able to execute the code you'll need to set the following configurations in the ` .env ` file to be able to connect to your database:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
 The you'll have to run the following commands to install all the dependencies and create the necessary tables and seed them with the information.

``` 
composer install
php artisan migrate:fresh --seed
npm install
``` 

To end you'll have to start the code with the next command:
```
composer run dev
```

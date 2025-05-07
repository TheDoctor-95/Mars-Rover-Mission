export class Planet {
    id: number;
    x: number; //max value of X
    y: number; //max value of Y
    constructor(x: number, y: number) {
        this.x = x
        this.y = y
    }
}


export class Rover {
    x: number;
    y: number;
    planet_id: number;
    direction: string;
    constructor(x: number, y: number, direction: string) {
        this.x = x
        this.y = y
        this.direction = direction;
    }
}

export class Obstacle {
    x: number;
    y: number;
    constructor(x: number, y: number) {
        this.x = x;
        this.y = y;
    }
}

<script >
import { defineComponent } from 'vue'
import { Planet, Rover } from '@/types/rover';
import { useForm } from '@inertiajs/vue3';
import { mapActions } from "vuex";

export default {
    props: {
        planet: Planet,
        rover: Rover
    },
    mounted() {
        this.loadAllObstacles()
    },
    methods: {
        ...mapActions("obstacles", ["getAllObstacles"]),
        loadAllObstacles() {
            this.getAllObstacles(1).then(response => {
                this.obstacles = response;
            });
        }
    },
    data() {
        return {
            obstacles: [],
        }
    },

}
</script>

<template>
    <table class="planet">

        <tr>
            <td> </td>
            <td :colspan="planet.x"> x </td>
            <td> </td>
        </tr>
        <tr v-for="y in planet.y" :key="`${y}`">
            <td :rowspan="planet.y" v-if="y==1"> y </td>
            <td v-for="x in planet.x" :key="`${y}-${x}`" :class="[rover.x ==x && rover.y == y? `rover ${rover.direction}`:'', {obstacle: this.obstacles.find(o => o.x == x && o.y == y)}]"></td>
            <td :rowspan="planet.y" v-if="y==1">  </td>

        </tr><tr>
            <td> </td>
            <td :colspan="planet.x">  </td>
            <td> </td>
        </tr>
    </table>
</template>

<style scoped>
.planet td{
    border: 1px solid black;
    height: 11px;
    width: 11px;
    text-align: center;
    font-size: 10px;
}
.planet td.rover{
    background-color: lightblue;
}

.planet td.rover.N{
    border-top-width: 4px;
    border-top-color: blue;
}

.planet td.rover.E{
    border-right-width: 4px;
    border-right-color: blue;
}

.planet td.rover.S{
    border-bottom-width: 4px;
    border-bottom-color: blue;
}

.planet td.rover.W{
    border-left-width: 4px;
    border-left-color: blue;
}
.planet td.obstacle{
    background-color: red;
}

</style>

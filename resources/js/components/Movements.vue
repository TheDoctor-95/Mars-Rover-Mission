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
        this.fetchMovements()
    },
    methods: {
        ...mapActions("movements", ["getMovements"]),
        fetchMovements() {
            this.getMovements({
                planet_id: this.planet.id,
                rover_id: this.rover.id
            }).then(response => {
                this.movements = response;
            });
        }
    },
    data() {
        return {
            movements: [],
        }
    },

}
</script>
<template>
    <table>

        <tr>
            <th>command</th>
            <th>x</th>
            <th>y</th>
            <th>direction</th>
            <th>status</th>
        </tr>
        <tr v-for="m in movements" :key="m.id">
            <td>{{m.command_executed}}</td>
            <td>{{m.x}}</td>
            <td>{{m.y}}</td>
            <td>{{m.direction}}</td>
            <td>{{m.status}}</td>

        </tr>
    </table>
</template>

<style scoped>
table{
    width: 100%;
}
table td, table th{

    border: 1px solid black
}
</style>

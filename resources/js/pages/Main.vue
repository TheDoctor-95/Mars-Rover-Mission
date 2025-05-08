<script setup>

    import PlanetComponent from"@/components/Planet.vue";
    import SendMovement from'@/components/SendMovement.vue';
    import Movements from '@/components/Movements.vue';
</script>
<script>
    import { defineComponent } from 'vue';
    import { ref } from 'vue';
    import { mapActions } from "vuex";



    export default defineComponent({
        mounted() {
            this.fetchPlanet();
        },
        data() {
            return {
                planet: null,
                rover: null
            }
        },
        methods: {
            ...mapActions("planets", ["getPlanet"]),
            fetchPlanet() {
                this.getPlanet().then(response => {
                    console.log(response);
                    this.planet = response;
                    this.fetchRover(response.id);
                })
            },

            ...mapActions("rovers", ["getRover"]),
            fetchRover(planet_id) {
                this.getRover(planet_id).then(response => {
                    console.log(response);
                    this.rover = response;
                })
            },
            update() {
                this.fetchPlanet();
                this.$refs.movements.fetchMovements();
            }
        },
    })


</script>


<template>
    <Head title="Mars Rover Mission">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />

    </Head>
    <div class=" min-h-screen flex flex-row bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center">

            <div class="pr-9">
                <PlanetComponent v-if="planet && rover" :planet="planet" :rover="rover"/>
            </div>
            <div class="flex-1 flex flex-col">

                <SendMovement v-if="planet && rover" :planet="planet" :rover="rover" @update="update"/>
                <div>
                    Moviments
                    <Movements v-if="planet && rover" :planet="planet" :rover="rover" ref="movements"/>
                </div>
            </div>
    </div>
</template>

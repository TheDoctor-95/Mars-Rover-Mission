
<script setup >
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';

</script>


<script>
    import { defineComponent } from 'vue';
    import { mapActions } from "vuex";
    import { Planet, Rover } from '@/types/rover';



export default defineComponent({

    props: {
        planet: Planet,
        rover: Rover
    },
        mounted() {

        },
        data() {
            return {
                command: "",
            }
        },
        methods: {
            ...mapActions("movements", ["sendCommand"]),
            send() {
                this.sendCommand({
                    planet_id: this.planet.id,
                    rover_id: this.rover.id,
                    command: this.command,
                }).then(response => {
                    console.log(response)
                    this.$emit("update");
                })
            },

        },
    })


</script>
<template>
    <div class="flex flex-row">
        <Input  v-model="command"/>
        <Button @click="send"> SEND</Button>
    </div>
</template>

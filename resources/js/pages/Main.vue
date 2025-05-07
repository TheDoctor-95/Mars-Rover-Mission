<script setup lang="ts">
import { Planet, Rover } from '@/types/rover';
import PlanetComponent from "@/components/Planet.vue"
import SendMovement from '@/components/SendMovement.vue';
import Movements from '@/components/Movements.vue';
import { defineComponent } from 'vue';
import { ref } from 'vue';

import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';

var planet = ref(new Planet(75, 75));
var rover = ref(new Rover(38, 38, "N"));

</script>


<template>
    <Head title="Mars Rover Mission">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />

    </Head>
    <div class=" min-h-screen flex flex-row bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center">

            <div class="pr-9">
                <PlanetComponent :planet="planet" :rover="rover"/>
            </div>
            <div class="flex-1 flex flex-col">

                <SendMovement />
                <div>
                    Moviments
                    <Movements />
                </div>
            </div>
    </div>
</template>

<template>
    <section>
        <div class="p-6">
            <div class="flex justify-center">
                <h1 class="font-semibold text-2xl">Signature Gallery</h1>
            </div>
            <div class="pt-8 flex justify-center">
                <div class="grid grid-cols-4 gap-4">
                    <div v-for="pict in images" :key="pict.id">
                        <!-- {{pict.image}} -->
                        <img :src="/storage/ + pict.image" class="border-2 border-black" alt="gambar">
                    </div> 
                </div>
            </div>
            <div class="pt-36 flex justify-center">
                <div>
                    <Link href="/" class="text-lg underline hover:text-blue-500">Back</Link>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    images: Array, 
});
</script>
<template>
    <form @submit.prevent="submit" enctype="multipart/form-data">
        <div class="p-4">
            <VueSignaturePad v-model="form.avatar" width="300px" height="300px" ref="signaturePad" class="border border-black" />
            <!-- <input type="file" @input="form.avatar = $event.target.files[0]" /> -->
        </div>
        <!-- <input type="file" > -->
        <div class="px-4 flex flex-wrap">
            <button type="submit" @click="save" class="bg-green-600 px-3 py-1 rounded-md text-white">Save</button>
            <button type="button" @click="undo" class="ml-2 bg-red-600 px-3 py-1 rounded-md text-white">Undo</button>
        </div>
    </form>
</template>



<script setup>
import { ref, onMounted } from 'vue';
import { VueSignaturePad } from 'vue-signature-pad';
import { useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia';

const signaturePad = ref(null);

function undo(){
    signaturePad.value.undoSignature();
}

const image = new Image();
function save(){
    const { isEmpty, data } = signaturePad.value.saveSignature();
    const test = signaturePad.value.fromDataURL(data);
    console.log(test);
}   


const form = useForm({
    name: null,
    avatar: null,
})


function submit(){
    form.post('/signature/store');
};

onMounted(() => {

});




</script>


<template>
    <section>
        <div class="bg-slate-100 h-screen">
            <div class="p-6 flex justify-center">
                <div>
                    <h1 class="text-2xl">Signature Page</h1>
                </div>
            </div>
            <div class="flex justify-center">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="p-4">
                        <VueSignaturePad v-model="form.avatar" width="300px" height="300px" ref="signaturePad" class="border border-black shadow-md" />
                        <!-- <input type="file" @input="form.avatar = $event.target.files[0]" /> -->
                    </div>
                    <!-- <input type="file" > -->
                    <div class="px-4 flex flex-wrap mx-auto justify-end">
                        <button type="submit" @click="save" class="bg-green-500 font-medium px-3 py-1 rounded-md text-white hover:bg-green-600 transition-colors">Save</button>
                        <button type="button" @click="undo" class="ml-2 bg-red-500 font-medium px-3 py-1 rounded-md text-white hover:bg-red-600 transition-colors">Undo</button>
                    </div>
                </form>
            </div>
            <div class="pt-16 top-0 flex justify-center">
                <div>
                    <Link href="/signature/gallery" class="underline hover:text-blue-500">Signature Gallery</Link>
                </div>
            </div>
        </div>
    </section>
</template>



<script setup>
import { ref, onMounted } from 'vue';
import { VueSignaturePad } from 'vue-signature-pad';
import { Link, useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia';


const signaturePad = ref(null);

function undo(){
    signaturePad.value.undoSignature();
}


function save(){
    if (signaturePad.value.isEmpty()) {
        alert("Please provide a signature first.");
    } else {
        const { data } = signaturePad.value.saveSignature();
        console.log(data);
        const blob = dataURLToBlob(data);
        form.signature = blob;
    }
}   

function dataURLToBlob(dataURL) {
  // Code taken from https://github.com/ebidel/filer.js
  var parts = dataURL.split(';base64,');
  var contentType = parts[0].split(":")[1];
  var raw = window.atob(parts[1]);
  var rawLength = raw.length;
  var uInt8Array = new Uint8Array(rawLength);

  for (var i = 0; i < rawLength; ++i) {
    uInt8Array[i] = raw.charCodeAt(i);
  }

  return new Blob([uInt8Array], { type: contentType });
}


const form = useForm({
    name: null,
    signature: null,
})


function submit(){
    form.post('/signature/store');
};

onMounted(() => {

});




</script>


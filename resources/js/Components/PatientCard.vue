<template>

    <div class="rounded-lg p-4 border-2 border-gray-400 bg-white shadow flex hover:bg-blue-100">
        <div class=" flex flex-1" >
            <img :src="patient.picUrl" alt="Product photo" class="w-[150px] h-[180px] border flex justify-center items-center bg-gray-300 text-center">

            <div class="ml-4 flex-1 cursor-pointer" @click="open(patient)">
                <h3 class="font-bold">
                     Details
                </h3>
                <hr>
                <div class="text-2xl">Name: {{ patient.name }}</div>
                <div class="italic">Address: {{ patient.address }}</div>
                <div class="italic">Age: {{ patient.age }}</div>
                <div class="italic">Height: {{ patient.height }}</div>
                <div class="italic">Weight: {{ patient.weight }}</div>
                <div class="italic">Email: {{ patient.email }}</div>

            </div>
            <div v-if="$page.props.auth.user.roles.includes('admin')" class="justify-between">
                <label :for="'status-' + patient.id" class="switch">
                  <input type="checkbox" :id="'status-' + patient.id" :checked="patient.enable" @change.prevent="toggleEnabled(patient)">
                  <span class="slider round"></span>
                </label>
            </div>
        </div>

    </div>

</template>

<style scoped>
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }

  /* Hide default HTML checkbox */
  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  /* The slider */
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #2196F3;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>

<script setup>
import { router } from '@inertiajs/vue3';


const props = defineProps({
    patient: Object
})

function open(patient) {
    router.visit('/patients/' + patient.id)
}

function toggleEnabled(patient) {
  router.visit('/patients/toggle/' + patient.id, {
    method: 'post',
    preserveScroll: true
  })
}
</script>

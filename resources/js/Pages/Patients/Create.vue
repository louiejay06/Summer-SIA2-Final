<template>
    <AppLayout title="Add">
      <template #header>
        <div class="flex">
          <h2 class="flex-1 font-semibold text-xl text-black-200 leading-tight">Create Patient</h2>
          <Link
            class="bg-green-500 text-white font-semibold py-2 px-4 border border-gray-700 rounded mb-2"
            as="button"
            href="/patients"
          >
            Back
          </Link>
        </div>
      </template>

      <div class="py-6">
        <div class="bg-white max-w-md p-4 mx-auto rounded-lg border">
          <form @submit.prevent="submit" class="flex flex-wrap">
            <div class="">
              <h4 class="text-xl mb-4 text-center">Patient's Info</h4>

              <div class="form-field">
                <label for="name">Name</label>
                <input type="text" id="name" v-model="form.name" class="input-field" />
              </div>

              <div class="form-field">
                <label for="address">Address</label>
                <input type="text" id="address" v-model="form.address" class="input-field" />
              </div>

              <div class="form-field">
                <label for="age">Age</label>
                <input type="number" id="age" v-model="form.age" class="input-field" />
              </div>

              <div class="form-field">
                <label for="weight">Weight</label>
                <input type="text" id="weight" v-model="form.weight" class="input-field" />
              </div>

              <div class="form-field">
                <label for="height">Height</label>
                <input type="number" id="height" v-model="form.height" class="input-field" />
              </div>

              <div class="form-field">
                <label for="email">Email</label>
                <input type="email" id="email" v-model="form.email" class="input-field" />
              </div>

              <div class="form-field">
                <label for="img">Student Image</label>
                <input type="file" @input="form.img = $event.target.files[0]" class="input-field" accept="image/jpeg" />
                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                  {{ form.progress.percentage }}%
                </progress>
              </div>

              <div class="mt-auto flex justify-end">
                <button class="bg-green-500 text-white font-semibold py-2 px-4 border border-gray-700 rounded mb-2" type="submit">Add Student</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </AppLayout>
  </template>

  <script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import { Link, useForm } from '@inertiajs/vue3';
  import { ref } from 'vue';

  const form = useForm({
    name: '',
    address: '',
    age: '',
    weight: '',
    height: '',
    email: '',
    img: '',
  });

  function submit() {
    form.post('/patients/');
  }
  </script>

  <style>
  .input-field {
    border: 1px solid #e2e8f0;
    padding: 0.5rem;
    width: 100%;
    border-radius: 0.375rem;
    margin-bottom: 1rem;
  }

  .w-40 {
    width: 10rem;
  }

  .h-40 {
    height: 10rem;
  }
  </style>

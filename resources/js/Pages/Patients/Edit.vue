<template>
    <AppLayout title="Edit">
      <template #header>
        <div class="flex items-center justify-between">
          <h2 class="text-2xl font-semibold text-gray-800 leading-tight">Edit</h2>
          <Link
            class="px-4 py-2 text-white font-semibold bg-green-500 rounded hover:bg-gray-700"
            :href="'/patients/' + patient.id"
            as="button"
          >
            Back
          </Link>
        </div>
      </template>

      <div class="py-6">
        <div class="bg-white max-w-md p-6 mx-auto rounded-lg shadow-md">
          <form @submit.prevent="submit" class="space-y-4">
            <h4 class="text-2xl font-semibold text-gray-800 mb-4">Edit Patient</h4>

            <div class="form-field">
              <label for="name" class="block text-sm font-semibold text-gray-600">Name</label>
              <input
                type="text"
                id="name"
                v-model="form.name"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
              />
            </div>

            <div class="form-field">
              <label for="address" class="block text-sm font-semibold text-gray-600">Address</label>
              <input
                type="text"
                id="address"
                v-model="form.address"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
              />
            </div>

            <div class="form-field">
              <label for="age" class="block text-sm font-semibold text-gray-600">Age</label>
              <input
                type="number"
                id="age"
                v-model="form.age"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
              />
            </div>

            <div class="form-field">
              <label for="weight" class="block text-sm font-semibold text-gray-600">Weight</label>
              <input
                type="text"
                id="weight"
                v-model="form.weight"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
              />
            </div>

            <div class="form-field">
              <label for="height" class="block text-sm font-semibold text-gray-600">Height</label>
              <input
                type="text"
                id="height"
                v-model="form.height"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
              />
            </div>

            <div class="form-field">
              <label for="email" class="block text-sm font-semibold text-gray-600">Email</label>
              <input
                type="email"
                id="email"
                v-model="form.email"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
              />
            </div>

            <div class="flex justify-end">
              <button
                class="px-6 py-2 text-white font-semibold bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring focus:border-blue-300"
                type="submit"
              >
                Save Changes
              </button>
            </div>
          </form>
        </div>
      </div>
    </AppLayout>
  </template>


<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Head, Link, useForm } from '@inertiajs/vue3';

    const props = defineProps({
        patient: Object
    })

    const form = useForm({
        name: props.patient.name,
        address: props.patient.address,
        age: props.patient.age,
        weight: props.patient.weight,
        height: props.patient.height,
        email: props.patient.email,
    })

    function submit() {
        form.patch('/patients/' + props.patient.id)
    }
</script>

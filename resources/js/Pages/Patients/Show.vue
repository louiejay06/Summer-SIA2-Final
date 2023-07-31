<template>
    <AppLayout title="Patients">
        <template #header>
            <div class="flex">
                <h2 class="flex-1 font-semibold text-xl text-black-200 leading-tight">Patient Details</h2>
                <Link v-if="$page.props.auth.user.roles.includes('admin')" :href="'/patients/email/' + patient.id" class="bg-green-500 text-white font-semibold py-2 px-4 border border-gray-700 rounded mb-2 mr-2">Send Email</Link>
                <Link class="bg-green-500 text-white font-semibold py-2 px-4 border border-gray-700 rounded mb-2" as="button" :href="'/patients/'">Back</Link>
            </div>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-green-100 overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex">
                        <div class="w-[400px] h-[400px] border flex justify-center items-center">
                            <img :src="patient.picUrl" alt="patient Image" class="aspect-square">
                        </div>
                        <div class="flex-1 ml-4">
                            <div class="flex">
                                <div>
                                    <Link v-if="$page.props.auth.user.roles.includes('admin')" class="bg-red-500 text-white font-semibold py-2 px-4 border border-gray-700 rounded mb-2 mr-2" :href="'/patients/' + patient.id" method="delete" as="button">Delete</Link>
                                    <Link v-if="$page.props.auth.user.roles.includes('admin')" class="bg-green-500 text-white font-semibold py-2 px-4 border border-gray-700 rounded mb-2" :href="'/patients/edit/' + patient.id" as="button">Edit</Link>
                                </div>
                            </div>
                            <div class="mt-4">Name: {{ patient.name }}</div>
                            <div class="mt-4">Address: {{ patient.address }}</div>
                            <div class="mt-4">Age: {{ patient.age }}</div>
                            <div class="mt-4">Weight: {{ patient.weight }}</div>
                            <div class="mt-4">Height: {{ patient.height }} - {{ patient.year_level }}</div>
                            <div class="mt-4">Email: {{ patient.email }}</div>
                            <div class="mt-4" v-if="patient.enable">
                                Enable: <bold class="text-green-500"> Yes </bold>
                            </div>
                            <div class="mt-4" v-else>
                                Enable: <bold class="text-red-500"> No </bold>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Head, Link, usePage } from '@inertiajs/vue3';
    import { computed } from 'vue'

    const props = defineProps({
        patient: Object,
        auth: Object
    })

    const page = usePage()

    const user = computed(() => page.props.auth.user)
</script>

<template>
    <AppLayout title="Patients">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Patients</h2>
                <div>
                    <input type="text" class="border border-gray-500 w-[250px] text-center" placeholder="&#128269;Search" @keydown.enter="search($event)">
                </div>
                <div>
                    <Link v-if="$page.props.auth.user.roles.includes('admin')" href="/patients/create" class="bg-green-500  text-white font-semibold  py-2 px-4 border border-gray-700 rounded mb-2">Add</Link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg flex flex-wrap justify-between">
                    <div class="w-[49%] mb-4" v-for="patient in patients" :key="patient.id">
                        <PatientCard :patient="patient" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import PatientCard from '@/Components/PatientCard.vue'
    import { usePage, router, Link } from '@inertiajs/vue3';
    import { computed } from 'vue'


    const props = defineProps({
        patients: Array,
        auth: Object
    })

    function search(ev) {
        router.visit('/patients/search/' + ev.target.value)
    }

    const page = usePage()

    const user = computed(() => page.props.auth.user)
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import UrlList from '@/Pages/UrlList.vue';
import UrlForm from '@/Pages/UrlForm.vue';
</script>

<template>
    <AppLayout title="UrlForm">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Url Shortened 
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <UrlForm />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

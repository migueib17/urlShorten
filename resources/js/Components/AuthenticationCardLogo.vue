<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="'/'">
        <svg
            class="w-16 h-16"
            viewBox="0 0 64 64"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <circle cx="32" cy="32" r="30" fill="#6875F5"/>
            <path d="M32 14 L24 32 L32 30 L40 32 Z" fill="black"/>
            <path d="M32 50 L24 32 L32 34 L40 32 Z" fill="black"/>
            <path d="M32 14 L34 32 L32 30 L30 32 Z" fill="black"/>
            <path d="M32 50 L30 32 L32 34 L34 32 Z" fill="black"/>
        </svg>
    </Link>
</template>

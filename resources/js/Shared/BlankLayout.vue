<script setup>
    import { Head } from "@inertiajs/vue3";
    import FlashMessage from "./FlashMessage.vue";

    const props = defineProps({
        title: {
            type: String
        }
    });

    const pageDescription = props.title + ' description';
</script>

<template>
    <Head>
        <title>{{ title }}</title>
        <meta name="description" :content="pageDescription">
    </Head>

    <FlashMessage />

    <div class="h-screen mx-auto flex justify-center items-center container">
        <div class="w-full ">
            <h1 class="mb-4 text-3xl font-bold">{{ title }}</h1>
            <slot />
        </div>
    </div>
</template>


<script setup>
    import { Head, Link } from "@inertiajs/vue3";
    import NavMenu from "./NavMenu.vue";
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
    <NavMenu/>

    <FlashMessage />

    <div class="mx-auto container">
        <h1 class="mb-4 text-3xl font-bold">{{ title }}</h1>
        <slot />
    </div>
</template>


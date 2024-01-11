<script setup>
import Layout from '../Shared/Layout.vue';

defineProps({
    title: {
        type: String
    }
})
</script>

<template>
<Layout :title="title">
</Layout>
</template>



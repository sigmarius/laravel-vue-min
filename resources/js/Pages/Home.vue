<template>
<h1>Hello {{ title }}!</h1>
</template>

<script setup>
defineProps({
    title: {
        type: String
    }
})
</script>

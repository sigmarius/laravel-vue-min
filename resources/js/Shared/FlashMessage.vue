<script setup>

</script>

<template>
    <p v-if="$page.props.message" class="my-6 bg-indigo-100 h-10 flex items-center justify-center text-sm font-medium text-indigo-600 px-4 sm:px-6 lg:px-8">
        {{ $page.props.message }}
    </p>
</template>


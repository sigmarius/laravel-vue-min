<script setup>
import { Link } from "@inertiajs/vue3";

// previousPage, nextPage, currentPage come from Laravel by Default
const PREDEFINED_PAGES = 3;

const props = defineProps({
    links: {
        type: Array,
        required: true
    },
    from: {
        type: Number,
    },
    to: {
        type: Number,
    },
    total: {
        type: Number,
    }
})
</script>

<template>
    <div v-if="links.length > PREDEFINED_PAGES" class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div
            v-if="from && to && total"
            class="sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{ from }}</span>
                    to
                    <span class="font-medium">{{ to }}</span>
                    of
                    <span class="font-medium">{{ total }}</span>
                    results
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                    <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                    <Link
                        v-for="(link, key) in links"
                        :key="key"
                        v-html="link.label"
                        :href="link.url ?? '#'"
                        :disabled="link.url === null"
                        :class="{
                            'text-white bg-indigo-600': link.active,
                            'bg-gray-100 pointer-events-none': link.url === null
                        }"
                        class="relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ring-1 ring-inset ring-gray-300 hover:bg-indigo-200 focus:outline-offset-0" />
                </nav>
            </div>
        </div>
    </div>

</template>

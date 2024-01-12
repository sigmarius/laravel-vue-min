<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import Layout from '../../Shared/Layout.vue';

const props = defineProps({
    title: {
        type: String
    },
    user: {
        type: Object,
        required: true
    }
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
});

const update = () => {
  form.patch(route('users.update', props.user.id));
}
</script>

<template>
    <Layout :title="title">
        <form @submit.prevent="update">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Имя</label>
                            <input
                                v-model="form.name"
                                :class="{'border-red-500': form.errors.name}"
                                type="text"
                                class="mt-1 p-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-100 rounded-md">
                            <div
                                v-if="form.errors.name"
                                class="text-red-500 mt-2"
                            >
                                {{ form.errors.name }}
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input
                                v-model="form.email"
                                :class="{'border-red-500': form.errors.email}"
                                type="email"
                                class="mt-1 p-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-100 rounded-md">
                            <div
                                v-if="form.errors.email"
                                class="text-red-500 mt-2"
                            >
                                {{ form.errors.email }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-5 flex items-center gap-3 bg-gray-50 sm:px-6">
                    <button
                        :disabled="form.processing"
                        type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm font-medium rounded-md text-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Обновить
                    </button>

                    <Link
                        :href="route('users.index')"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm font-medium rounded-md text-sm text-gray-700 bg-gray-300 hover:text-white hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Вернуться назад
                    </Link>
                </div>

                <div
                    v-if="form.isDirty"
                    class="p-3 font-mono text-gray-400 italic"
                >
                    Данные изменены, не забудьте сохранить форму!
                </div>
            </div>
        </form>
    </Layout>
</template>

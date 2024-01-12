<script setup>
import { useForm } from "@inertiajs/vue3";
import Layout from '../Shared/BlankLayout.vue';

defineProps({
    title: {
        type: String
    }
});

const form = useForm({
    email: null,
    password: null
});

const login = () => {
  form.post(route('login'));
}
</script>

<template>
    <Layout :title="title">
        <form @submit.prevent="login">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

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

                        <div class="col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Пароль</label>
                            <input
                                v-model="form.password"
                                :class="{'border-red-500': form.errors.password}"
                                type="password"
                                class="mt-1 p-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-100 rounded-md">
                            <div
                                v-if="form.errors.password"
                                class="text-red-500 mt-2"
                            >
                                {{ form.errors.password }}
                            </div>
                        </div>

                    </div>
                </div>

                <div class="p-5 flex items-center gap-3 bg-gray-50 sm:px-6">
                    <button
                        :disabled="form.processing"
                        type="submit"
                        class="min-w-32 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm font-medium rounded-md text-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Войти
                    </button>
                </div>
            </div>
        </form>
    </Layout>
</template>

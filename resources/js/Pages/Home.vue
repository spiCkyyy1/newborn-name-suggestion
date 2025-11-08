<!-- resources/js/Pages/Home.vue -->
<template>
    <main class="min-h-screen bg-gradient-to-b from-sky-50 to-white flex flex-col items-center py-12">
        <div class="w-full max-w-2xl bg-white shadow-xl rounded-2xl p-8 border border-slate-100">
            <div class="mb-10 pb-4 border-b border-sky-100">
                <h1 class="text-4xl font-extrabold text-sky-700 flex items-center justify-center gap-3">
                    <UserIcon class="w-8 h-8 text-sky-600" />
                    Baby Name Suggestions
                </h1>
            </div>


            <AlertMessage
                v-if="flash.success"
                :key="Date.now() + flash.success"
                type="success"
                :title="flash.success"
            />
            <AlertMessage
                v-if="flash.error"
                :key="Date.now() + flash.success"
                type="error"
                :title="flash.error"
            />
            <SuggestionForm class="mb-10 mt-6"  :family="family"/>
            <SuggestionList :suggestions="suggestions" :family="family" />
        </div>

        <footer class="py-8 text-sm text-slate-500">
            <div class="container mx-auto px-4 flex justify-center items-center gap-1.5">
                <span>&copy; {{ year }} Our Family — Made with</span>

                <HeartIcon class="w-4 h-4 text-red-500 fill-red-500" />

                <span></span>
            </div>
        </footer>
    </main>
</template>

<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import AlertMessage from '../Components/AlertMessage.vue'
import SuggestionForm from "../Components/SuggestionForm.vue";
import SuggestionList from '../Components/SuggestionList.vue'
import { HeartIcon, UserIcon } from '@heroicons/vue/24/solid'
defineProps({ family: Object, suggestions: Array })
const flash = computed(() => usePage().props?.flash || {})
const year = computed(() => new Date().getFullYear())
</script>

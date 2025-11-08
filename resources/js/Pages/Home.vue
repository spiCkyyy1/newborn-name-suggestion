<!-- resources/js/Pages/Home.vue -->
<template>
    <main class="min-h-screen bg-gradient-to-b from-sky-50 to-white flex flex-col items-center py-12">
        <div class="w-full max-w-2xl bg-white shadow-xl rounded-2xl p-8 border border-slate-100">
            <h1 class="text-4xl font-extrabold text-center text-sky-700 mb-8">
                👶 Baby Name Suggestions
            </h1>
<!--            👨‍👩‍👧‍👦 {{ family.name }} - -->

            <!--            <div class="flex items-center gap-2">-->
<!--                <UserCircleIcon class="w-6 h-6 text-sky-600" />-->
<!--                <span>Baby Name Suggestions</span>-->
<!--            </div>-->
            <!-- success/error messages -->
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
            <SuggestionForm class="mb-10"  :family="family"/>
            <SuggestionList :suggestions="suggestions" :family="family" />
        </div>

        <footer class="mt-8 text-slate-500 text-sm">
            Made with ❤️ by our family
        </footer>
    </main>
</template>

<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import AlertMessage from '../Components/AlertMessage.vue'
import SuggestionForm from "../Components/SuggestionForm.vue";
import SuggestionList from '../Components/SuggestionList.vue'
import { HeartIcon, UserCircleIcon } from '@heroicons/vue/24/solid'
defineProps({ family: Object, suggestions: Array })
const flash = computed(() => usePage().props?.flash || {})
</script>

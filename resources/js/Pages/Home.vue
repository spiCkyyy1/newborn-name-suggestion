<!-- resources/js/Pages/Home.vue -->
<template>
    <main class="min-h-screen bg-gradient-to-b from-sky-50 to-white flex flex-col items-center py-12">
        <div class="w-full max-w-2xl bg-white shadow-xl rounded-2xl p-8 border border-slate-100">
            <h1 class="text-4xl font-extrabold text-center text-sky-700 mb-8">
                👶 Baby Name Suggestions
            </h1>

<!--            <div class="flex items-center gap-2">-->
<!--                <UserCircleIcon class="w-6 h-6 text-sky-600" />-->
<!--                <span>Baby Name Suggestions</span>-->
<!--            </div>-->

            <SuggestionForm class="mb-10" />
            <SuggestionList />
        </div>

        <footer class="mt-8 text-slate-500 text-sm">
            Made with ❤️ by our family
        </footer>
    </main>
</template>

<script setup>
import SuggestionForm from "../Components/SuggestionForm.vue";
import SuggestionList from '../Components/SuggestionList.vue'
import { HeartIcon, UserCircleIcon } from '@heroicons/vue/24/solid'
</script>

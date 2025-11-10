<template>
    <div class="min-h-screen bg-slate-50 flex flex-col">
        <header
            class="bg-white shadow-lg py-5 px-8 flex justify-between items-center border-b border-sky-100"
        >
            <div class="flex items-center gap-3">
                <ShieldCheckIcon class="w-7 h-7 text-sky-600" />
                <h1 class="text-2xl font-extrabold text-slate-800">
                    Admin Panel
                </h1>
            </div>

            <div class="flex items-center gap-5">
                <a
                    href="/admin/families"
                    class="text-sky-600 font-semibold hover:text-sky-800 transition duration-150 p-2 rounded-lg hover:bg-sky-50"
                >
                    Families
                </a>

                <form @submit.prevent="logout">
                    <button
                        type="submit"
                        class="px-5 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg flex items-center gap-1.5"
                    >
                        <ArrowLeftStartOnRectangleIcon class="w-5 h-5" />
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <main class="flex-1 container mx-auto p-8">
            <slot />
        </main>

        <footer
            class="bg-white text-center text-sm text-slate-500 py-4 border-t border-slate-200"
        >
            © {{ new Date().getFullYear() }} Newborn Name Suggestions — Admin
        </footer>
    </div>
</template>

<script setup>
import { router } from "@inertiajs/vue3";
import { defineProps } from "vue";
// Heroicon Imports
import {
    ShieldCheckIcon,
    ArrowLeftStartOnRectangleIcon,
} from "@heroicons/vue/24/solid";
const props = defineProps({
    logoutUrl: {
        type: String,
        required: true,
    },
});

function logout() {
    router.post(props.logoutUrl);
}
</script>

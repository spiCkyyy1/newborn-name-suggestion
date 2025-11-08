<template>
    <div class="antialiased bg-gradient-to-b from-sky-50 to-white min-h-screen flex items-center justify-center text-slate-700">
        <div class="max-w-2xl mx-auto text-center px-6 py-12 bg-white shadow-2xl rounded-3xl border border-slate-100">

            <div class="mb-8 text-center">
                <div class="flex justify-center items-center gap-4 mb-3">
                    <UserGroupIcon class="w-16 h-16 text-pink-500" />

                    <HeartIcon class="w-16 h-16 text-red-600" />

                </div>

                <h1 class="text-4xl font-extrabold text-sky-700">
                    Welcome to Our Family Name Hub
                </h1>
            </div>

            <p class="text-lg text-slate-600 leading-relaxed">
                Only invited family members are allowed to use this service.<br>
                Please reach out to the <span class="font-semibold text-sky-600">admin</span> to receive your invite link.
            </p>

            <div class="mt-10">
                <Link
                    href="/contact"
                    class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-sky-600 hover:bg-sky-700 text-white font-semibold shadow-md transition-all duration-300"
                >
                    <span class="w-5 h-5 flex items-center justify-center">
                        <EnvelopeOpenIcon class="w-full h-full" />
                    </span>
                    &nbsp; Contact Admin
                </Link>
            </div>

            <footer class="mt-16 py-8 border-t border-slate-200 text-sm text-slate-500">
                <div class="container mx-auto px-4 flex justify-center items-center gap-1.5">
                    <span>&copy; {{ year }} Our Family — Made with</span>

                    <HeartIcon class="w-4 h-4 text-red-500 fill-red-500" />

                    <span></span>
                </div>
            </footer>
        </div>
    </div>

</template>
<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'
import { HeartIcon, UserGroupIcon, EnvelopeOpenIcon } from "@heroicons/vue/24/solid";
const year = computed(() => new Date().getFullYear())
</script>

<template>
    <div
        class="antialiased bg-gradient-to-b from-sky-50 to-white min-h-screen flex flex-col justify-center text-slate-700 p-4"
    >
        <div
            class="w-full max-w-2xl mx-auto text-center p-6 sm:p-12 bg-white shadow-2xl rounded-3xl border border-slate-100 my-8"
        >
            <div class="mb-8 text-center">
                <!-- Icons (Scaled for mobile) -->
                <div class="flex justify-center items-center gap-4 mb-3">
                    <UserGroupIcon
                        class="w-12 h-12 sm:w-16 sm:h-16 text-pink-500"
                    />
                    <HeartIcon class="w-12 h-12 sm:w-16 sm:h-16 text-red-600" />
                </div>

                <!-- Title (Scaled for mobile) -->
                <h1
                    class="text-3xl sm:text-4xl font-extrabold text-sky-700 leading-tight"
                >
                    Welcome to Our Family Name Hub
                </h1>
            </div>

            <!-- Body Text -->
            <p
                class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-xl mx-auto"
            >
                Only invited family members are allowed to use this service.<br
                    class="hidden sm:inline"
                />
                Please reach out to the
                <span class="font-bold text-sky-600">admin</span> to receive
                your unique invite link.
            </p>

            <!-- Contact Button -->
            <div class="mt-10">
                <Link
                    href="/contact"
                    class="inline-flex items-center justify-center px-8 py-3 rounded-xl bg-sky-600 hover:bg-sky-700 text-white font-bold shadow-lg hover:shadow-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-sky-300 focus:ring-offset-2 text-base sm:text-lg"
                >
                    <EnvelopeOpenIcon class="w-5 h-5 mr-2" />
                    Contact Admin
                </Link>
            </div>

            <!-- Alert Messages -->
            <AlertMessage
                v-if="flash.success"
                :key="Date.now() + flash.success"
                type="success"
                class="mt-8"
                :title="flash.success"
            />
            <AlertMessage
                v-if="flash.error"
                :key="Date.now() + flash.success"
                type="error"
                class="mt-8"
                :title="flash.error"
            />

            <!-- Footer -->
            <footer
                class="mt-16 pt-8 border-t border-slate-200 text-xs sm:text-sm text-slate-500"
            >
                <div class="flex justify-center items-center gap-1.5">
                    <span>&copy; {{ year }} Our Family — Made with</span>
                    <!-- Heart Icon -->
                    <HeartIcon
                        class="w-3 h-3 sm:w-4 sm:h-4 text-red-500 fill-red-500 shrink-0"
                    />
                </div>
            </footer>
        </div>
    </div>
</template>
<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import {
    HeartIcon,
    UserGroupIcon,
    EnvelopeOpenIcon,
} from "@heroicons/vue/24/solid";
import AlertMessage from "../Components/AlertMessage.vue";
const flash = computed(() => usePage().props?.flash || {});
const year = computed(() => new Date().getFullYear());
</script>

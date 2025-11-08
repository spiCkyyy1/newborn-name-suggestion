<template>
    <main class="max-w-3xl mx-auto p-4 sm:p-8 bg-sky-50 min-h-screen">
        <h1
            class="text-4xl font-extrabold mb-10 text-center text-sky-800 flex items-center justify-center gap-3"
        >
            <HomeModernIcon class="w-8 h-8 text-sky-600" />
            Family Manager
        </h1>

        <form
            @submit.prevent="createFamily"
            class="bg-white p-8 rounded-3xl shadow-xl border border-sky-100 mb-10 space-y-6"
        >
            <h2
                class="text-xl font-bold text-slate-700 mb-4 border-b border-slate-100 pb-2"
            >
                Create New Family
            </h2>

            <label class="block">
                <span class="text-slate-600 font-semibold mb-2 block"
                    >Family Name</span
                >
                <input
                    v-model="form.name"
                    type="text"
                    class="w-full p-3 rounded-xl border border-slate-300 shadow-sm focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition"
                    placeholder="e.g. Smith Family"
                    required
                />
            </label>

            <p v-if="form.errors.name" class="text-sm text-red-600 mt-1">
                {{ form.errors.name.join(",") }}
            </p>

            <button
                type="submit"
                :disabled="form.processing"
                class="w-full px-5 py-3 bg-sky-600 hover:bg-sky-700 text-white rounded-xl font-bold shadow-md transition-all duration-200 flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed"
            >
                <LinkIcon class="w-5 h-5 -rotate-45 transform" />
                Create Family Link
            </button>
        </form>

        <div class="space-y-4">
            <h2
                class="text-xl font-bold text-slate-700 mb-4 border-b border-slate-100 pb-2"
            >
                Existing Families
            </h2>

            <div
                v-if="families.length"
                class="border border-slate-200 rounded-xl overflow-hidden shadow-lg"
            >
                <div
                    v-for="family in families"
                    :key="family.id"
                    class="bg-white p-4 flex justify-between items-center border-b border-slate-100 last:border-b-0 hover:bg-slate-50 transition"
                >
                    <div class="flex items-center gap-3">
                        <UserGroupIcon class="w-6 h-6 text-sky-500" />
                        <div>
                            <p class="font-bold text-slate-800">
                                {{ family.name }}
                            </p>
                            <p class="text-xs text-slate-500 mt-0.5 italic">
                                Slug: {{ family.slug }}
                            </p>
                        </div>
                    </div>

                    <a
                        :href="`/family/${family.slug}`"
                        class="px-3 py-1 text-sm bg-sky-100 text-sky-700 font-semibold rounded-lg hover:bg-sky-200 transition"
                        target="_blank"
                    >
                        Open Page
                    </a>
                </div>
            </div>

            <p v-else class="text-center text-slate-500 py-6 italic">
                No families found. Create one above!
            </p>
        </div>
    </main>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import {
    HomeModernIcon,
    UserGroupIcon,
    LinkIcon,
} from "@heroicons/vue/24/solid";
defineProps({
    families: Array,
});

const form = useForm({ name: "" });

function createFamily() {
    form.post("/admin/families", {
        headers: {
            "x-admin-key": import.meta.env.VITE_ADMIN_KEY_HASH,
        },
        onSuccess: () => form.reset(),
    });
}
</script>

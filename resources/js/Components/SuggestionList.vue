<template>
    <section class="space-y-6">
        <div
            class="flex justify-between items-center mb-8 pb-4 border-b border-slate-200"
        >
            <h2 class="text-3xl font-extrabold text-sky-800">
                Family Suggestions
            </h2>
            <div class="flex items-center space-x-4">
                <button
                    @click="pick('boy')"
                    class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg shadow-md transition-all duration-200 flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:shadow-sm"
                    :disabled="props.suggestions.length === 0"
                >
                    <SparklesIcon class="w-5 h-5" />
                    Pick Boy Name
                </button>
                <button
                    @click="pick('girl')"
                    class="px-5 py-2 bg-pink-600 hover:bg-pink-700 text-white font-semibold rounded-lg shadow-md transition-all duration-200 flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:shadow-sm"
                    :disabled="props.suggestions.length === 0"
                >
                    <SparklesIcon class="w-5 h-5" />
                    Pick Girl Name
                </button>
            </div>
        </div>

        <ul
            v-if="props.suggestions.length"
            class="divide-y divide-slate-200 border border-slate-200 rounded-xl bg-white shadow-xl overflow-hidden"
        >
            <li
                v-for="s in props.suggestions"
                :key="s.id"
                class="p-4 flex justify-between items-center hover:bg-sky-50 transition duration-150 group"
            >
                <div>
                    <p
                        class="font-semibold text-lg text-slate-800 flex items-center gap-2"
                    >
                        <UserIcon class="w-5 h-5 text-sky-600" />
                        {{ s.family_member_name }}
                        <span class="text-slate-400 font-normal text-sm ml-1"
                            >({{ s.relation || "N/A" }})</span
                        >
                    </p>
                    <div class="text-slate-600 text-sm mt-1 flex space-x-4">
                        <div class="flex items-center gap-1">
                            <FaceSmileIcon class="w-4 h-4 text-blue-500" />
                            <span class="font-medium">{{
                                s.boy_name || "—"
                            }}</span>
                        </div>

                        <span class="text-slate-300">|</span>

                        <div class="flex items-center gap-1">
                            <HeartIcon
                                class="w-4 h-4 text-pink-500 fill-pink-500"
                            />
                            <span class="font-medium">{{
                                s.girl_name || "—"
                            }}</span>
                        </div>
                    </div>
                </div>

                <!--                <button-->
                <!--                    @click="remove(s.id)"-->
                <!--                    class="text-slate-400 hover:text-red-600 opacity-0 group-hover:opacity-100 transition duration-200 p-2 rounded-full hover:bg-red-50"-->
                <!--                >-->
                <!--                    <XMarkIcon class="w-5 h-5" />-->
                <!--                </button>-->
            </li>
        </ul>

        <p
            v-else
            class="text-center text-slate-500 border border-slate-200 rounded-xl py-12 bg-white shadow-sm italic"
        >
            No suggestions yet — be the first to add one!
        </p>

        <div
            v-if="picked"
            class="mt-10 text-center p-8 bg-gradient-to-r from-sky-50 to-white rounded-xl border border-sky-300 shadow-xl"
        >
            <h3
                class="text-3xl font-extrabold text-sky-700 mb-2 flex items-center justify-center gap-3"
            >
                <GiftIcon class="w-7 h-7 text-sky-500" />
                Picked Name Reveal
            </h3>
            <p class="text-xl text-slate-800 mt-4">
                The lucky name is
                <span class="font-extrabold text-sky-600">{{
                    picked.selected_name
                }}</span
                >!
            </p>
            <p class="text-md text-slate-600 mt-1">
                Suggested by
                <strong>{{ picked.suggestion.family_member_name }}</strong> ({{
                    picked.suggestion.relation || "N/A"
                }})
            </p>
        </div>
    </section>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { router } from "@inertiajs/vue3";
import {
    SparklesIcon,
    GiftIcon,
    XMarkIcon,
    FaceSmileIcon,
    HeartIcon,
    UserIcon,
} from "@heroicons/vue/24/solid";

const props = defineProps({
    suggestions: Array,
    family: Object,
});

const picked = ref(null);

function remove(id) {
    try {
        router.delete(`/family/${props.family.slug}/${id}`, {
            preserveScroll: true,
            preserveState: true,
            onSuccess: () => {
                router.visit(window.location.href, {
                    only: ["suggestions"],
                    preserveScroll: true,
                    preserveState: true,
                });
            },
            onError: (e) => console.error(e),
        });
    } catch (e) {
        console.log(e.response?.data?.message ?? "Sorry, unable to remove.");
    }
}

async function pick(type) {
    try {
        const { data } = await axios.get(
            `/family/${props.family.slug}/shuffle`,
            { params: { type } },
        );

        if (data.success) {
            picked.value = data;
        }
    } catch (e) {
        console.log(e.response?.data?.message ?? "No suggestions found");
    }
}
</script>

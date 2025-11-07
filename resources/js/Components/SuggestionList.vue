<template>
    <section>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-sky-700">Family Suggestions</h2>
            <div class="space-x-3">
                <button
                    @click="pick('boy')"
                    class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg shadow-sm transition"
                    :disabled="props.suggestions.length === 0"
                >
                    🎲 Pick Boy Name
                </button>
                <button
                    @click="pick('girl')"
                    class="px-4 py-2 bg-pink-500 hover:bg-pink-600 text-white rounded-lg shadow-sm transition"
                    :disabled="props.suggestions.length === 0"
                >
                    🎲 Pick Girl Name
                </button>
            </div>
        </div>

        <ul
            v-if="props.suggestions.length"
            class="divide-y divide-slate-200 border border-slate-100 rounded-xl bg-white shadow-sm"
        >
            <li
                v-for="s in props.suggestions"
                :key="s.id"
                class="p-4 flex justify-between items-center hover:bg-sky-50 transition"
            >
                <div>
                    <p class="font-semibold text-slate-800">
                        {{ s.family_member_name }}
                        <span class="text-slate-500 text-sm">({{ s.relation || '—' }})</span>
                    </p>
                    <p class="text-slate-600 text-sm">
                        👦 <span class="font-medium">{{ s.boy_name || '—' }}</span> |
                        👧 <span class="font-medium">{{ s.girl_name || '—' }}</span>
                    </p>
                </div>
                <button
                    @click="remove(s.id)"
                    class="text-red-500 hover:text-red-700 text-sm font-semibold transition"
                >
                    ✕
                </button>
            </li>
        </ul>

        <p v-else class="text-center text-slate-500 py-8">
            No suggestions yet — be the first to add one!
        </p>

        <div
            v-if="picked"
            class="mt-10 text-center p-6 bg-gradient-to-r from-sky-100 to-white rounded-xl border border-sky-200"
        >
            <h3 class="text-2xl font-bold text-sky-700 mb-2">🎉 Picked Name</h3>
            <p class="text-lg text-slate-700">
                <span class="font-semibold">{{ picked.selected_name }}</span>
                suggested by <strong>{{ picked.suggestion.family_member_name }}</strong>
                ({{ picked.suggestion.relation || '—' }})
            </p>
        </div>
    </section>
</template>


<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    suggestions: Array,
    family: Object
})

const picked = ref(null)


async function remove(id) {
    try {
        await axios.delete(`/family/${props.family.slug}/${id}`)
        // Optionally refresh the suggestions list
        router.reload({ only: ['suggestions'] }) // if you're using Inertia
        // OR emit an event to reload manually if using local API fetch
    } catch (e) {
        alert(e.response?.data?.message ?? 'Sorry, unable to remove.')
    }
}

async function pick(type) {
    try {
        const { data } = await axios.get(`/family/${props.family.slug}/shuffle`, { params: { type } })

        if(data.success)
        {
            picked.value = data
        }
    } catch (e) {
        alert(e.response?.data?.message ?? 'No suggestions found')
    }
}
</script>

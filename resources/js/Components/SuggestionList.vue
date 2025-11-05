<template>
    <section>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-sky-700">Family Suggestions</h2>
            <div class="space-x-3">
                <button
                    @click="pick('boy')"
                    class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg shadow-sm transition"
                >
                    🎲 Pick Boy Name
                </button>
                <button
                    @click="pick('girl')"
                    class="px-4 py-2 bg-pink-500 hover:bg-pink-600 text-white rounded-lg shadow-sm transition"
                >
                    🎲 Pick Girl Name
                </button>
            </div>
        </div>

        <ul
            v-if="suggestions.length"
            class="divide-y divide-slate-200 border border-slate-100 rounded-xl bg-white shadow-sm"
        >
            <li
                v-for="s in suggestions"
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
import { ref, onMounted } from 'vue'
import axios from 'axios'


const suggestions = ref([])
const picked = ref(null)


async function load() {
    const { data } = await axios.get('/api/suggestions')
    suggestions.value = data
}


async function remove(id) {
    await axios.delete(`/api/suggestions/${id}`)
    await load()
}


async function pick(type) {
    try {
        const { data } = await axios.get('/api/suggestions/pick', { params: { type } })
        picked.value = data
    } catch (e) {
        alert(e.response?.data?.message ?? 'No suggestions found')
    }
}


onMounted(load)
window.addEventListener('suggestions:created', load)
</script>

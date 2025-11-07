<template>
    <main class="max-w-3xl mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6 text-center">👨‍👩‍👧 Family Manager</h1>

        <!-- Create Family -->
        <form @submit.prevent="createFamily" class="bg-white p-6 rounded-2xl shadow mb-8 space-y-4">
            <label class="block">
                <span class="text-gray-700 font-semibold">Family Name</span>
                <input
                    v-model="form.name"
                    type="text"
                    class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-sky-200"
                    placeholder="e.g. Smith Family"
                    required
                />
            </label>
            <button
                type="submit"
                class="px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white rounded-lg font-semibold"
            >
                Create Family Link
            </button>
        </form>

        <!-- Family List -->
        <div class="space-y-3">
            <h2 class="text-xl font-bold mb-2">Existing Families</h2>
            <div
                v-for="family in families"
                :key="family.id"
                class="bg-white p-4 rounded-xl shadow flex justify-between items-center"
            >
                <div>
                    <p class="font-semibold">{{ family.name }}</p>
                    <p class="text-sm text-gray-500">Slug: {{ family.slug }}</p>
                </div>
                <a
                    :href="`/family/${family.slug}`"
                    class="text-sky-600 hover:underline font-medium"
                    target="_blank"
                >
                    Open Family Page
                </a>
            </div>
        </div>
    </main>
</template>

<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    families: Array
})

const form = ref({ name: '' })

function createFamily() {
    router.post('/admin/families', form.value, {
        headers: {
            'x-admin-key': '123456'
        },
        onSuccess: () => (form.value.name = ''),
    })
}
</script>

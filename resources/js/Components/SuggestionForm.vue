<template>
    <form
        @submit.prevent="submit"
        class="space-y-6 bg-sky-50 p-6 rounded-xl shadow-inner border border-sky-100"
    >
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-slate-600 font-semibold mb-1" for="family_member_name">
                    Your Name
                </label>
                <input
                    id="family_member_name"
                    v-model="form.family_member_name"
                    name="family_member_name"
                    type="text"
                    placeholder="e.g. Alice"
                    class="w-full rounded-xl border-slate-300 focus:ring-2 focus:ring-sky-400 focus:outline-none p-3 text-slate-700"
                    required
                />

                <p v-if="form.errors.family_member_name" class="text-sm text-red-600 mt-1">{{ form.errors.family_member_name.join(',') }}</p>
            </div>

            <div>
                <label class="block text-slate-600 font-semibold mb-1" for="relation">
                    Relation
                </label>
                <input
                    id="relation"
                    v-model="form.relation"
                    type="text"
                    name="relation"
                    placeholder="e.g. Aunt, Uncle"
                    class="w-full rounded-xl border-slate-300 focus:ring-2 focus:ring-sky-400 focus:outline-none p-3 text-slate-700"
                />
                <p v-if="form.errors.relation" class="text-sm text-red-600 mt-1">{{ form.errors.relation.join(',') }}</p>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-slate-600 font-semibold mb-1" for="boy_name">
                    Baby Boy Name
                </label>
                <input
                    id="boy_name"
                    v-model="form.boy_name"
                    type="text"
                    name="boy_name"
                    placeholder="e.g. Oliver"
                    class="w-full rounded-xl border-slate-300 focus:ring-2 focus:ring-sky-400 focus:outline-none p-3 text-slate-700"
                />
                <p v-if="form.errors.boy_name" class="text-sm text-red-600 mt-1">{{ form.errors.boy_name.join(',') }}</p>
            </div>

            <div>
                <label class="block text-slate-600 font-semibold mb-1" for="girl_name">
                    Baby Girl Name
                </label>
                <input
                    id="girl_name"
                    v-model="form.girl_name"
                    name="girl_name"
                    type="text"
                    placeholder="e.g. Olivia"
                    class="w-full rounded-xl border-slate-300 focus:ring-2 focus:ring-sky-400 focus:outline-none p-3 text-slate-700"
                />
                <p v-if="form.errors.girl_name" class="text-sm text-red-600 mt-1">{{ form.errors.girl_name.join(',') }}</p>
            </div>
        </div>

        <div class="text-center">
            <button
                type="submit"
                :disabled="form.processing"
                class="px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white font-semibold rounded-xl shadow-md transition-all"
            >
                💌 Submit Suggestion
            </button>
        </div>
        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
            {{ form.progress.percentage }}%
        </progress>
    </form>
</template>


<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    family: Object
})

const form = useForm({
    family_member_name: '',
    relation: '',
    boy_name: '',
    girl_name: ''
})

function submit() {
    form.post(`/family/${props.family.slug}/suggestions`, {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    })
}
</script>

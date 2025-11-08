<template>
    <main class="min-h-screen bg-gradient-to-b from-sky-50 to-white flex items-center justify-center py-16 px-4">
        <div class="w-full max-w-lg bg-white p-10 rounded-3xl shadow-xl border border-slate-100">
            <!-- Header -->
            <h1 class="text-4xl font-extrabold text-sky-700 mb-8 text-center">Contact Us</h1>

            <!-- Success Alert -->
            <AlertMessage v-if="flash.success"
                          :key="Date.now() + flash.success"
                          type="success" :title="flash.success"
                          class="mb-6" />

            <!-- Form -->
            <form @submit.prevent="submit" class="space-y-6">
                <!-- Name Field -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Name</label>
                    <input
                        v-model="form.name"
                        type="text"
                        placeholder="Your Name"
                        class="w-full rounded-xl border border-slate-300 p-3 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:border-sky-400 transition"
                    />
                    <p v-if="form.errors.name" class="text-sm text-red-600 mt-1">{{ form.errors.name.join(', ') }}</p>
                </div>

                <!-- Email Field -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                    <input
                        v-model="form.email"
                        type="email"
                        placeholder="Your Email"
                        class="w-full rounded-xl border border-slate-300 p-3 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:border-sky-400 transition"
                    />
                    <p v-if="form.errors.email" class="text-sm text-red-600 mt-1">{{ form.errors.email.join(', ') }}</p>
                </div>

                <!-- Message Field -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Message</label>
                    <textarea
                        v-model="form.message"
                        rows="6"
                        placeholder="Your Message"
                        class="w-full rounded-xl border border-slate-300 p-3 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:border-sky-400 transition resize-none"
                    ></textarea>
                    <p v-if="form.errors.message" class="text-sm text-red-600 mt-1">{{ form.errors.message.join(', ') }}</p>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full bg-sky-600 hover:bg-sky-700 disabled:opacity-50 disabled:cursor-not-allowed text-white font-semibold rounded-xl py-3 shadow-md transition flex items-center justify-center gap-2"
                >
                    📬 Send Message
                </button>

                <!-- Progress Bar -->
                <div v-if="form.progress" class="mt-2 h-2 w-full bg-slate-200 rounded-full overflow-hidden">
                    <div
                        class="h-full bg-sky-600 transition-all"
                        :style="{ width: form.progress.percentage + '%' }"
                    ></div>
                </div>
            </form>
        </div>
    </main>
</template>

<script setup>
import { computed } from 'vue'
import { useForm, usePage } from '@inertiajs/vue3'
import AlertMessage from "../Components/AlertMessage.vue";

const flash = computed(() => usePage().props?.flash || {})
const form = useForm({
    name: '',
    email: '',
    message: '',
})

function submit() {
    form.post('/contact', {
        onSuccess: () => form.reset()
    })
}
</script>

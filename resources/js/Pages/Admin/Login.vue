<template>
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-sky-100 to-sky-300"
    >
        <div
            class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md space-y-6"
        >
            <h2 class="text-2xl font-bold text-sky-700 text-center">
                Admin Login
            </h2>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label
                        for="email"
                        class="block text-sm font-semibold text-slate-600 mb-1"
                        >Email</label
                    >
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="w-full border border-slate-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-sky-400 focus:outline-none"
                        placeholder="admin@example.com"
                        required
                    />
                    <!--                    <p v-if="form.errors.email" class="text-sm text-red-600 mt-1">{{ form.errors.email }}</p>-->
                </div>

                <div>
                    <label
                        for="password"
                        class="block text-sm font-semibold text-slate-600 mb-1"
                        >Password</label
                    >
                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="w-full border border-slate-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-sky-400 focus:outline-none"
                        placeholder="••••••••"
                        required
                    />
                    <p
                        v-if="form.errors.password"
                        class="text-sm text-red-600 mt-1"
                    >
                        {{ form.errors.password }}
                    </p>
                </div>

                <button
                    type="submit"
                    class="w-full bg-sky-600 hover:bg-sky-700 text-white font-semibold py-2 rounded-xl transition-all shadow-md"
                >
                    Sign In
                </button>

                <p
                    v-if="form.errors.email"
                    class="text-center text-sm text-red-600 mt-2"
                >
                    {{ form.errors.email.join(",") }}
                </p>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: "",
    password: "",
});

function submit() {
    form.post("/admin/login", { preserveScroll: true });
}
</script>

<template>
    <transition
        enter-active-class="transform ease-out duration-300 transition"
        enter-from-class="translate-y-2 opacity-0"
        enter-to-class="translate-y-0 opacity-100"
        leave-active-class="transform ease-in duration-200 transition"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="visible"
            :class="[
                'rounded-xl p-4 flex items-start shadow-md border-l-4 transition-all duration-300',
                type === 'success'
                    ? 'bg-green-50 border-green-500 text-green-800'
                    : 'bg-red-50 border-red-500 text-red-800',
            ]"
        >
            <div class="flex-1">
                <p class="font-semibold text-base">
                    {{ title }}
                </p>
                <p v-if="message" class="text-sm text-slate-600 mt-1">
                    {{ message }}
                </p>
            </div>
            <button
                @click="visible = false"
                class="ml-4 text-slate-400 hover:text-slate-600 transition"
                aria-label="Close"
            >
                ✕
            </button>
        </div>
    </transition>
</template>

<script setup>
import { ref, watchEffect, watch } from "vue";
import { usePage } from "@inertiajs/vue3";
const props = defineProps({
    type: {
        type: String,
        default: "success", // or 'error'
    },
    title: {
        type: String,
        required: true,
    },
    message: {
        type: String,
        default: "",
    },
    duration: {
        type: Number,
        default: 4000, // auto-hide after 4s
    },
});

const visible = ref(true);
const page = usePage();
// Re-trigger visibility whenever the page flash updates
watch(
    () => page.props.flash,
    () => {
        visible.value = true;
    },
    { deep: true },
);
// Automatically hide after duration
watchEffect(() => {
    if (visible.value && props.duration > 0) {
        const timeout = setTimeout(
            () => (visible.value = false),
            props.duration,
        );
        return () => clearTimeout(timeout);
    }
});
</script>

<template>
    <div
        class="text-decoration-none d-flex align-center justify-center text-center rounded-md pa-6 h-100"
        :class="bgColor"
    >
        <div :class="bgColor">
            <v-icon :icon="icon" :color="color" size="60" />
            <div
                class="text-subtitle-1 text-capitalize font-weight-bold mt-3"
                :class="textColor"
            >
                {{ label }}
            </div>
            <h4 class="text-h4 mt-1" :class="textColor">{{ count }}</h4>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
    count: {
        type: [Number, String],
        required: true,
    },
    label: {
        type: String,
        required: true,
    },
    icon: {
        type: String,
        required: true,
    },
    color: {
        type: String,
        required: false,
        default: "primary",
    },
});

const bgColor = computed(() => {
    return `bg-light${props.color}`;
});
const textColor = computed(() => {
    return `text-${props.color}`;
});
</script>

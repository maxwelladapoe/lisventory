<template>
    <v-breadcrumbs :items="items">
        <template #title="{ item }">
            <Link
                v-if="!item.disabled"
                :href="item.href"
                class="v-breadcrumbs-item--link"
            >
                {{ item.title }}
            </Link>
            <span v-else>{{ item.title }}</span>
        </template>
    </v-breadcrumbs>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    items: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <perfect-scrollbar class="scrollnavbar">
        <v-list nav class="pa-6">
            <!-- List Menu -->
            <Link
                v-for="(item, key) in navigation.items"
                :key="key"
                :href="item.to"
                as="div"
                class="mb-1"
            >
                <v-list-item
                    :prepend-icon="item.icon"
                    :title="item.title"
                    :exact="item.exact"
                    color="primary"
                    rounded="lg"
                    link
                    :class="{
                        'v-list-item--active': $page.url.startsWith(item.to),
                    }"
                />
            </Link>
        </v-list>
    </perfect-scrollbar>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import navigation from "@/Configs/navigation";
</script>

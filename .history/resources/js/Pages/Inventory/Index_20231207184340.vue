<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout title="Inventory">
        <template #headerAction>

        </template>
        {{ page.props.inventory }}
        <div>
            <v-data-table-server
                v-model:items-per-page="paginationItems.perPage"
                :search="search"
                :headers="TableHeaders"
                :items-length="paginationItems.total"
                :items="inventory"
                :loading="loading"
                item-value="name"
                @update:options="loadItems"
            >
            </v-data-table-server>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";
import {TableHeaders} from "@/Configs/inventoryConfig"

const page = usePage();

const inventory = computed(() => {
    return page.props.inventory.data;
});

const paginationItems = computed(() => {
    const inv = page.props.inventory;
    return {
        total: inv.total,
        perPage: inv.per_page,
    };
});
</script>

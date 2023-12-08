<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout title="Inventory">
        <div>
            <v-data-table-server
                v-model:items-per-page="paginationItems.perPage"
                :search="search"
                :headers="headers"
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
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import { Head } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();

const inventory = computed(() => {
    return page.props.inventory.data;
});

const paginationItems = computed(() => {
    return {
        total: inventory.value.total,
        perPage: inventory.value.per_page,
    };
});
</script>

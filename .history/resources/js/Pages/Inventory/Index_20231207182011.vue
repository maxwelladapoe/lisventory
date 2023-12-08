<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <div class="mb-5">
            <h5 class="text-h5 font-weight-bold">Inventory</h5>
            <Breadcrumbs :items="breadcrumbs" class="pa-0 mt-1" />
        </div>

        <div>
            {{ inventory }}

            <v-data-table-server
                v-model:items-per-page="itemsPerPage"
                :search="search"
                :headers="headers"
                :items-length="totalItems"
                :items="serverItems"
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
    return page.props.inventory;
});

const paginationItems = computed(() => {
    
});

const breadcrumbs = [
    {
        title: "Inventory",
        disabled: true,
    },
];
</script>

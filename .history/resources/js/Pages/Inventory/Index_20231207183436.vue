<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout title="Inventory">
        {{ page.props.inventory }}
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
import { Head } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

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


tableHeaders= [
        {
          title: 'Dessert (100g serving)',
          align: 'start',
          sortable: false,
          key: 'name',
        },
        { title: 'Calories', key: 'calories', align: 'end' },
        { title: 'Fat (g)', key: 'fat', align: 'end' },
        { title: 'Carbs (g)', key: 'carbs', align: 'end' },
        { title: 'Protein (g)', key: 'protein', align: 'end' },
        { title: 'Iron (%)', key: 'iron', align: 'end' },
      ],
</script>

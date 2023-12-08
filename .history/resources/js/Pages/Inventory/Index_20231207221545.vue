<template>
    <Head title="All Inventory" />
    <AuthenticatedLayout title="Inventory">
        <template #headerAction>
            <div>
                <Link href="/inventory/create">
                    <v-btn block rounded="lg">Create Item</v-btn>
                </Link>
            </div>
        </template>

        <div>
            <div>
                <v-text-field
                    v-model="search"
                    label="Search"
                    prepend-inner-icon="mdi-magnify"
                    single-line
                    variant="outlined"
                    hide-details
                ></v-text-field>
            </div>
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
                <template v-slot:item.stock="{ item }">
                    <div class="text-end">
                        <v-chip
                            :color="item.quantity > 0 ? 'green' : 'red'"
                            :text="
                                item.quantity > 0 ? 'In stock' : 'Out of stock'
                            "
                            class="text-uppercase"
                            label
                            size="small"
                        ></v-chip>
                    </div>
                </template>

                <template v-slot:item.action="{ item }">
                    <div class="text-end">
                        <v-menu>
                            <template v-slot:activator="{ props }">
                                <v-btn
                                    variant="plain"
                                    icon="mdi-dots-horizontal"
                                    v-bind="props"
                                    size="small"
                                ></v-btn>
                            </template>

                            <v-list>
                                <v-list-item
                                    v-for="(item, i) in TableActionItems"
                                    :key="i"
                                >
                                    <v-list-item-title>{{
                                        item.title
                                    }}</v-list-item-title>
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    </div>
                </template>
            </v-data-table-server>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";
import { TableHeaders, TableActionItems } from "@/Configs/inventoryConfig";
import { Link } from "@inertiajs/vue3";

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

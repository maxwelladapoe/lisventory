<template>
    <Head title="All Inventory" />
    <AuthenticatedLayout title="Inventory">
        <template #headerAction>
            <div>
                <Link href="/inventory/create" as="div">
                    <v-btn block rounded="lg">Add Item</v-btn>
                </Link>
            </div>
        </template>

        <div>
            <v-card>
                <v-card-text>
                    <v-row>
                        <v-col cols="12" md="6" lg="4">
                            <v-text-field
                                variant="outlined"
                                placeholder="Search"
                                density="compact"
                                v-model="searchQuery"
                                @update:model-value="debouncedFn"
                            />
                        </v-col>
                    </v-row>
                    <v-data-table-server
                        v-model:items-per-page="paginationItems.perPage"
                        :headers="TableHeaders"
                        :items-length="paginationItems.total"
                        :items="inventory"
                        item-value="name"
                    >
                        <template v-slot:item.created_at="{ item }">
                            {{ getTimeAgo(item.created_at) }}
                        </template>
                        <template v-slot:item.stock="{ item }">
                            <div>
                                <v-chip
                                    :color="item.quantity > 0 ? 'green' : 'red'"
                                    :text="
                                        item.quantity > 0
                                            ? 'In stock'
                                            : 'Out of stock'
                                    "
                                    class="text-uppercase"
                                    label
                                    size="small"
                                ></v-chip>
                            </div>
                        </template>

                        <template v-slot:item.action="{ item }">
                            <div>
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
                                            v-for="(
                                                actionItem, i
                                            ) in TableActionItems"
                                            :key="i"
                                            @click="
                                                menuActionClick(
                                                    actionItem,
                                                    item
                                                )
                                            "
                                        >
                                            <v-list-item-title>
                                                {{ actionItem.title }}
                                            </v-list-item-title>
                                        </v-list-item>
                                    </v-list>
                                </v-menu>
                            </div>
                        </template>
                    </v-data-table-server>
                </v-card-text>
            </v-card>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import { TableHeaders, TableActionItems } from "@/Configs/inventoryConfig";
import { useTimeAgo, useDebounceFn } from "@vueuse/core";

const page = usePage();
const inventory = computed(() => {
    return page.props.inventory.data;
});
const searchQuery = ref();

const paginationItems = computed(() => {
    const inv = page.props.inventory;
    return {
        total: inv.total,
        perPage: inv.per_page,
    };
});

function getTimeAgo(date) {
    return useTimeAgo(date).value;
}

function menuActionClick(actionItem, rowItem) {
    if (actionItem.id === "edit") {
        router.visit(`/inventory/edit/${rowItem.id}`);
    }
}

const debouncedFn = useDebounceFn(() => {
    // search
    router.visit(`/inventory?search=${searchQuery.value}`);
}, 1000);
</script>

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
                            <TableItemMenu :action-items="TableActionItems" :is-loading="form.processing" @menu-item-clicked="menuActionClick($event, item)"/>
                        </template>
                    </v-data-table-server>
                </v-card-text>
            </v-card>
        </div>
    </AuthenticatedLayout>

    <DeleteModal
        v-model="openDeleteModal"
        title="Delete Inventory"
        @approveDelete="deleteInventory"
    >
        <div>
            {{ currentSelectedItem.name }}
        </div>
    </DeleteModal>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router, usePage, useForm } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import { TableHeaders, TableActionItems } from "@/Configs/inventoryConfig";
import { useTimeAgo, useDebounceFn } from "@vueuse/core";
import DeleteModal from "@/Components/Modals/DeleteModal.vue";
import TableItemMenu from "@/Components/TableItemMenu.vue";

const page = usePage();
const inventory = computed(() => {
    return page.props.inventory.data;
});
const searchQuery = ref();
const openDeleteModal = ref(false);
const currentSelectedItem = ref(null);
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
    currentSelectedItem.value = rowItem;
    switch (actionItem.id) {
        case "edit":
            router.visit(`/inventory/edit/${rowItem.id}`);
            break;

        case "delete":
            openDeleteModal.value = true;
            break;
    }
}

const debouncedFn = useDebounceFn(() => {
    // search
    router.visit(`/inventory?search=${searchQuery.value}`);
}, 1000);

const form = useForm({
    id: "",
});

function deleteInventory() {
    form.id = currentSelectedItem.value.id;
    form.delete(route("inventory.destroy"));
}
</script>

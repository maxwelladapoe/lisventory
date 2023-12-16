<template>
    <Head title="Suppliers" />
    <AuthenticatedLayout title="Suppliers">
        <template #headerAction>
            <div>
                <Link href="/suppliers/create" as="v-btn">
                    <v-btn block rounded="lg">Add Supplier</v-btn>
                </Link>
            </div>
        </template>

        <v-card>
            <v-card-item>
                <!-- <div class="mb-6 mt-6">
                <v-text-field
                    v-model="search"
                    label="Search"
                    prepend-inner-icon="mdi-magnify"
                    single-line
                    variant="outlined"
                    hide-details
                ></v-text-field>
            </div> -->
                <v-data-table-server
                    v-model:items-per-page="paginationItems.perPage"
                    :search="search"
                    :headers="TableHeaders"
                    :items-length="paginationItems.total"
                    :items="suppliers"
                    :loading="loading"
                    item-value="name"
                    @update:options="loadItems"
                >
                    <template v-slot:item.created_at="{ item }">
                        {{ getTimeAgo(item.created_at) }}
                    </template>

                    <template v-slot:item.name="{ item }">
                        {{ item.first_name }} {{ item.last_name }}
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
                                    <template
                                        v-for="(
                                            actionItem, i
                                        ) in TableActionItems"
                                        :key="i"
                                    >
                                        <template
                                            v-if="actionItem.type == 'link'"
                                        >
                                            <Link
                                                :href="`suppliers/edit/${item.id}`"
                                            >
                                                <v-list-item>
                                                    <v-list-item-title>{{
                                                        actionItem.title
                                                    }}</v-list-item-title>
                                                </v-list-item>
                                            </Link>
                                        </template>
                                        <template v-else>
                                            <v-list-item>
                                                <v-list-item-title>{{
                                                    actionItem.title
                                                }}</v-list-item-title>
                                            </v-list-item>
                                        </template>
                                    </template>
                                </v-list>
                            </v-menu>
                        </div>
                    </template>
                </v-data-table-server>
            </v-card-item>
        </v-card>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";
import { TableHeaders, TableActionItems } from "@/Configs/SuppliersConfig";
import { Link } from "@inertiajs/vue3";
import { useTimeAgo } from "@vueuse/core";

const page = usePage();
const suppliers = computed(() => {
    return page.props.suppliers.data;
});

const paginationItems = computed(() => {
    const cus = page.props.suppliers;
    return {
        total: cus.total,
        perPage: cus.per_page,
    };
});

function getTimeAgo(date) {
    return useTimeAgo(date).value;
}
</script>

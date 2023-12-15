<template>
    <Head title="Invoices" />
    <AuthenticatedLayout title="Invoices">
        <template #headerAction>
            <div>
                <Link href="/invoices/create" as="v-btn">
                    <v-btn block rounded="lg">Add Invoice</v-btn>
                </Link>
            </div>
        </template>

        <div>
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
                :items="invoices"
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
                                    v-for="(actionItem, i) in TableActionItems"
                                    :key="i"
                                >
                                    <template v-if="actionItem.type == 'link'">
                                        <Link :href="`invoices/edit/${item.id}`">
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
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head,Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";
import { TableHeaders, TableActionItems } from "@/Configs/InvoicesConfig";
import { useTimeAgo } from "@vueuse/core";

const page = usePage();
const invoices = computed(() => {
    return page.props.invoices.data;
});

const paginationItems = computed(() => {
    const cus = page.props.invoices;
    return {
        total: cus.total,
        perPage: cus.per_page,
    };
});

function getTimeAgo(date) {
    return useTimeAgo(date).value;
}
</script>

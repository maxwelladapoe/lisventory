<template>
    <Head title="Edit Customer" />
    <AuthenticatedLayout>
        <div>
            <v-container>
                <v-row>
                    <v-col cols="12" lg="8">
                        <AddCustomerForm categories="categories" is-editing :selected-item="customer" />
                    </v-col>
                </v-row>
            </v-container>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AddCustomerForm from "@/Components/Forms/AddCustomerForm.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage();

const customer = computed(() => {
    return page.props.customer;
});
</script>

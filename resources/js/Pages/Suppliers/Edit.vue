<template>
    <Head title="Edit Customer" />
    <AuthenticatedLayout hide-header>
        <v-card title="Edit Customer">
            <v-card-item>
                <AddCustomerForm is-editing :selected-item="customer" />
            </v-card-item>
        </v-card>
    </AuthenticatedLayout>
</template>

<script setup>
import AddCustomerForm from "@/Components/Forms/AddCustomerForm.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();

const customer = computed(() => {
    return page.props.customer;
});
</script>

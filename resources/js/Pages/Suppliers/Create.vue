<template>
    <Head title="Create Supplier" />
    <AuthenticatedLayout  hide-header>
        <v-card title="Create Supplier">
            <v-card-item>
                <AddSupplierForm />
            </v-card-item>
        </v-card>
    </AuthenticatedLayout>
</template>

<script setup>
import AddSupplierForm from "@/Components/Forms/AddSupplierForm.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>

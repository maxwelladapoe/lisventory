<template>
    <Head title="Create Supplier" />
    <AuthenticatedLayout>
        <div>
            <v-container>
                <v-row>
                    <v-col cols="12" lg="8">
                        <AddSupplierForm categories="categories" />
                    </v-col>
                </v-row>
            </v-container>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AddSupplierForm from "@/Components/Forms/AddSupplierForm.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>

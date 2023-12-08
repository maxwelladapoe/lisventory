<template>
    <Head title="Create Customer" />
    <AuthenticatedLayout>
        <div>
            <v-container>
                <v-row>
                    <v-col cols="12" lg="8">
                        <AddCustomerForm categories="categories" />
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
</script>

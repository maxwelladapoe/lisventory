<template>
    <Head title="Create Inventory" />
    <AuthenticatedLayout hide-header="">
        <v-card title="Create Inventory">
            <v-card-text>
                <AddItemForm :categories="categories" />
            </v-card-text>
        </v-card>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import AddItemForm from "@/Components/Forms/AddItemForm.vue";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();
const categories = computed(() => {
    return page.props.categories;
});
</script>

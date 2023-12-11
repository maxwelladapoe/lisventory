<template>
    <Head title="Edit Inventory" />
    <AuthenticatedLayout hide-header>
        <v-card title="Edit Inventory">
            <v-card-text>
                <AddItemForm :categories="categories" is-editing />
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

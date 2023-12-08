<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout title="Dashboard">
 
        <v-card>
            <v-card-text>
                <div class="text-h6 text-medium-emphasis">
                    Welcome back, {{ $page.props.auth.user.name }}!
                </div>
            </v-card-text>
        </v-card>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import { Head } from "@inertiajs/vue3";

const breadcrumbs = [
    {
        title: "Dashboard",
        disabled: true,
    },
];
</script>

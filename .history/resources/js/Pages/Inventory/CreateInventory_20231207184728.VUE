<template>
    <Head title="Create Inventory" />
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
import { Head } from "@inertiajs/vue3";
</script>

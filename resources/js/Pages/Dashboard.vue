<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout
        title="Dashboard"
        :breadcrumbs="breadcrumbs"
        hide-header
    >
        <v-row>
            <v-col>
                <v-row>
                    <v-col cols="12" lg="4">
                        <WelcomeCard />
                    </v-col>
                    <v-col cols="12" lg="2">
                        <StatsCard label="Inventory" icon="mdi-package-variant" :count="5000" color="warning"/>
                    </v-col>
                     <v-col cols="12" lg="2">
                        <StatsCard label="Orders" icon="mdi-cart-variant" :count="5000"/>
                    </v-col>
                     <v-col cols="12" lg="2">
                        <StatsCard label="Customers" icon="mdi-account-multiple-outline" :count="5000"  color="warning"/>
                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="12">
                <v-row>
                    <!-- Sales overview -->
                    <v-col cols="12" lg="8">
                        <SalesOverview />
                    </v-col>
                    <!-- Yearly Breakup / Monthly Earnings -->
                    <v-col cols="12" lg="4">
                        <div class="mb-6">
                            <YearlyBreakup />
                        </div>
                        <div>
                            <MonthlyEarnings />
                        </div>
                    </v-col>
                    <!-- Recent transaction -->
                    <v-col cols="12" lg="4">
                        <RecentTransaction />
                    </v-col>
                    <!-- Product performance -->
                    <v-col cols="12" lg="8">
                        <ProductPerformance />
                    </v-col>
                    <!-- Product Cards -->
                    <v-col cols="12">
                        <ProductCards />
                    </v-col>
                </v-row>
            </v-col>
            <v-col class="text-center mt-2">
                <p class="text-muted">
                    Design and Developed by
                    <a
                        flat
                        variant="text"
                        href="https://adminmart.com/"
                        target="_blank"
                        class="pl-1 text-primary"
                        >AdminMart.com</a
                    >
                </p>
            </v-col>
        </v-row>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
// import group1 from "../../images/group1.png"
import MonthlyEarnings from "@/Components/Dashboard/MonthlyEarnings.vue";
import ProductCards from "@/Components/Dashboard/ProductCards.vue";
import ProductPerformance from "@/Components/Dashboard/ProductPerformance.vue";
import RecentTransaction from "@/Components/Dashboard/RecentTransaction.vue";
import SalesOverview from "@/Components/Dashboard/SalesOverview.vue";
import YearlyBreakup from "@/Components/Dashboard/YearlyBreakup.vue";
import WelcomeCard from "@/Components/Dashboard/WelcomeCard.vue";
import StatsCard from "@/Components/Dashboard/StatsCard.vue";

const breadcrumbs = [
    {
        title: "Dashboard",
        disabled: true,
    },
];
</script>

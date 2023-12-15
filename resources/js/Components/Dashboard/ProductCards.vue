<template>
    <v-row>
        <v-col cols="12" lg="3" sm="6" v-for="card in productsCard" :key="card.title">
            <v-card>
                <Link :href="card.link">
                    <v-img :src="card.photo" height="100%" class="rounded-t-md"></v-img>
                </Link>
                <div class="d-flex justify-end mr-4 mt-n5">
                    <v-btn size="40" icon class="bg-primary d-flex">
                        <v-avatar size="30" class="text-white">

                                    <v-icon
                                    icon="mdi mdi-basket"
                                    size="15"
                                />
                        </v-avatar>
                        <v-tooltip
                            activator="parent"
                            location="bottom"
                        >Add To Cart
                        </v-tooltip>
                    </v-btn>
                </div>
                <v-card-item class="pt-0">
                    <h6 class="text-h6" v-text="card.title"></h6>
                    <div class="d-flex align-center justify-space-between mt-1">
                        <div>
                            <span class="text-h6" v-text="'$'+ card.price"></span>
                            <span class="text-body-1 ml-2 text-medium-emphasis text-decoration-line-through" v-text="'$'+ card.salesPrice"></span>
                        </div>
                        <v-rating density="compact" color="warning" size="small" v-model="card.rating" readonly></v-rating>
                    </div>
                </v-card-item>
            </v-card>
        </v-col>
    </v-row>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import { productsCard } from '@/Data/DashboardData';
</script>

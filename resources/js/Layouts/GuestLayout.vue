<template>
    <v-app class="bg-grey-lighten-4">
        <v-main>
            <div class="authentication">
                <v-container fluid>
                    <v-row
                        align="center"
                        justify="center"
                        style="height: 100vh"
                    >
                        <v-col
                            cols="12"
                            sm="12"
                            md="10"
                            lg="4"
                            xl="3"
                            class="d-flex align-center"
                        >
                            <v-card
                                rounded="md"
                                elevation="10"
                                class="px-sm-1 px-0 withbg mx-auto"
                                max-width="500"
                            >
                                <v-card-item class="pa-sm-8">
                                    <div class="d-flex justify-center py-4">
                                        <ApplicationLogo style="height: 30" />
                                    </div>
                                    <slot /> </v-card-item
                            ></v-card>
                        </v-col>
                    </v-row>
                </v-container>
            </div>
        </v-main>
    </v-app>
</template>

<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

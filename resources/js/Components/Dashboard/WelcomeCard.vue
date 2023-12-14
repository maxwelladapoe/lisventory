<template>
    <v-card class="bg-lightprimary">
        <v-card-item class="pa-0 overflow-visible">
            <div
                class="d-sm-flex align-center justify-space-between overflow-visible"
            >
                <v-card-title class="text-h5 pa-6">
                    Welcome back,
                    {{ $page.props.auth.user.name }}!
                </v-card-title>

                <div class="position-relative">
                    <img src="../../../images/group1.png" width="180" />
                </div>
            </div>
        </v-card-item>
    </v-card>
</template>

<script setup></script>

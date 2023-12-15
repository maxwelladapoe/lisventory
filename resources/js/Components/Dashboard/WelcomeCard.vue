<template>
    <v-card class="bg-lightprimary overflow-scroll">
        <v-card-item class="pa-0">
            <div class="d-sm-flex align-center justify-space-between pt-6 px-6">
                <v-card-title class="text-h5 pb-6">
                    <p>Welcome back,</p>
                    <p>{{ $page.props.auth.user.name }}!</p>
                </v-card-title>

                <img src="../../../images/group1.png" height="200" />
            </div>
        </v-card-item>
    </v-card>
</template>

<script setup></script>

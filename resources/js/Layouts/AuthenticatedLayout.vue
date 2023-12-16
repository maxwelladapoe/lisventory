<template>
    <v-app>
        <v-navigation-drawer
            v-model="drawer"
            app
            class="leftSidebar"
            left
            elevation="0"
        >
            <div class="px-6 pt-4 pb-6">
                <ApplicationLogo height="30" />
            </div>
            <NavigationMenu />
        </v-navigation-drawer>

        <v-app-bar elevation="0" height="70">
            <v-app-bar-nav-icon
                v-if="$vuetify.display.mobile"
                @click.stop="drawer = !drawer"
                variant="flat"
                size="small"
                color="transparent"
                rounded="full"
            />
            <!-- <v-app-bar-nav-icon  /> -->
            <template v-slot:append>
                <div>
                    <v-menu min-width="200px" rounded>
                        <template v-slot:activator="{ props }">
                            <v-btn icon v-bind="props">
                                <v-avatar size="35">
                                    <v-img
                                        :alt="user.name"
                                        :src="avatar"
                                    ></v-img>
                                </v-avatar>
                            </v-btn>
                        </template>
                        <v-card rounded>
                            <v-card-text>
                                <div class="mx-auto text-right">
                                    <h3>{{ user.name }}</h3>
                                    <p class="text-caption mt-1">
                                        {{ user.email }}
                                    </p>
                                    <v-divider class="my-3"></v-divider>
                                    <v-btn rounded variant="text">
                                        Edit Account
                                    </v-btn>
                                    <v-divider class="my-3"></v-divider>
                                    <v-btn rounded variant="text">
                                        Disconnect
                                    </v-btn>
                                </div>
                            </v-card-text>
                        </v-card>
                    </v-menu>
                </div>
            </template>
        </v-app-bar>
        <v-main>
            <v-container fluid class="page-wrapper">
                <div class="maxWidth">
                    <slot
                        name="header"
                        v-if="(title || $slots.header) && !hideHeader"
                    >
                        <v-card class="mb-12">
                            <v-card-text>
                                <div class="d-flex justify-space-between">
                                    <div class="mb-5">
                                        <h5 class="text-h5 font-weight-bold">
                                            {{ title }}
                                        </h5>
                                        <Breadcrumbs
                                            v-if="breadcrumbs"
                                            :items="breadcrumbs"
                                            class="pa-0 mt-1"
                                        />
                                    </div>

                                    <div>
                                        <slot name="headerAction" />
                                    </div>
                                </div>
                            </v-card-text>
                        </v-card>
                    </slot>
                    <slot />
                </div>
            </v-container>
        </v-main>
    </v-app>
</template>

<script setup>
import NavigationMenu from "@/Components/NavigationMenu.vue";
import md5 from "crypto-js/md5";
import { useToast } from "vue-toastification";
import { ref, computed, watch, onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import { useDisplay } from "vuetify";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const drawer = ref(true);
const rail = ref(false);
const toast = useToast();
defineProps({
    title: {
        type: String,
        required: false,
    },
    showBreadCrumbs: {
        type: Boolean,
        required: false,
        default: false,
    },
    breadcrumbs: {
        type: Array,
        required: false,
    },
    hideHeader: {
        type: Boolean,
        required: false,
        default: false,
    },
});
const page = usePage();
const { mobile } = useDisplay();

const avatar = computed(() => {
    return `https://www.gravatar.com/avatar/${md5(
        page.props.auth.user.email
    )}?s=200`;
});

const user = computed(() => page.props.auth.user);

watch(
    () => page.props.flash,
    () => {
        const flash = page.props.flash;
        if (flash && flash.success) {
            toast.success(flash.success);
        } else if (flash && flash.error) {
            toast.error(flash.error);
        }
    },
    { immediate: true }
);

// onMounted(() => {
//     drawer.value = !mobile.value;
// });
</script>

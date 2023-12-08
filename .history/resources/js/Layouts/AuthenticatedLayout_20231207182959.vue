<template>
    <v-app class="bg-grey-lighten-4">
        <v-navigation-drawer v-model="drawer" :rail="rail" permanent>
            <v-list>
                <v-list-item
                    :prepend-avatar="avatar"
                    :title="page.props.auth.user.name"
                    :subtitle="page.props.auth.user.email"
                />
            </v-list>
            <v-divider />
            <NavigationMenu />
        </v-navigation-drawer>
        <v-app-bar color="primary">
            <v-app-bar-nav-icon
                v-if="$vuetify.display.mobile"
                @click.stop="drawer = !drawer"
            />
            <v-app-bar-nav-icon v-else @click.stop="rail = !rail" />
            <v-toolbar-title text="Laravel" />
        </v-app-bar>
        <v-main>
            <v-container>
                <slot name="header" v-if="title || $slots.header">
                    <div class="mb-5">
                        <h5 class="text-h5 font-weight-bold">{{ title }}</h5>
                        <Breadcrumbs v-if="breadcrumbs" :items="props.breadcrumbs" class="pa-0 mt-1" />
                    </div>
                </slot>
                <slot />
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

const drawer = ref(false);
const rail = ref(false);

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
    breadCrumbs: {
        type: Array,
        required: false,
    },
});
const page = usePage();
const { mobile } = useDisplay();

const avatar = computed(() => {
    return `https://www.gravatar.com/avatar/${md5(
        page.props.auth.user.email
    )}?s=200`;
});

watch(
    () => page,
    () => {
        const toast = useToast();
        const flash = page.props.flash;
        if (flash.success) {
            toast.success(flash.success);
        } else if (flash.error) {
            toast.error(flash.error);
        }
    }
);

onMounted(() => {
    drawer.value = !mobile.value;
});
</script>

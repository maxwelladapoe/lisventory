<template>
    <GuestLayout>
        <Head title="Log in" />

        <v-form @submit.prevent="submit">
            <div>
                <v-label> Email </v-label>
                <v-text-field
                    v-model="form.email"
                    type="email"
                    placeholder="Email address"
                    prepend-inner-icon="mdi-email-outline"
                    :error-messages="form.errors.email"
                />
            </div>

            <div>
                <v-label> Password </v-label>
                <v-text-field
                    v-model="form.password"
                    placeholder="Enter your password"
                    prepend-inner-icon="mdi-lock-outline"
                    :append-inner-icon="
                        showPassword ? 'mdi-eye-off' : 'mdi-eye'
                    "
                    :type="showPassword ? 'text' : 'password'"
                    :error-messages="form.errors.password"
                    @click:append-inner="showPassword = !showPassword"
                />
            </div>

            <div class="d-flex flex-wrap align-center ml-n2 pa-0">
                <v-checkbox
                    v-model="form.remember"
                    color="primary"
                    hide-details
                >
                    <template v-slot:label class="text-body-1 py-0"
                        >Remember me</template
                    >
                </v-checkbox>
                <div class="ml-sm-auto">
                    <Link
                        class="text-primary text-decoration-none text-body-1 opacity-1 font-weight-medium"
                        href="/forgot-password"
                        rel="noopener noreferrer"
                        target="_blank"
                    >
                        Forgot password?</Link
                    >
                </div>
            </div>

            <v-btn
                :loading="form.processing"
                type="submit"
                block
                class="mb-5 mt-3"
                size="large"
                flat
                >Login</v-btn
            >
        </v-form>
        <h6
            class="text-h6 text-muted font-weight-medium d-flex justify-center align-center mt-3"
        >
            New to lisventory?
            <Link
                href="/register"
                class="text-primary text-decoration-none text-body-1 opacity-1 font-weight-medium pl-2"
            >
                Create an account</Link
            >
        </h6>
    </GuestLayout>
</template>
<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "johndoe@mail.com",
    password: "password",
    remember: false,
});
const showPassword = ref(false);

const submit = () => {
    form.post("/login", {
        onFinish: () => form.reset("password"),
    });
};
</script>
<script>
export default {
    name: "LoginPage",
};
</script>

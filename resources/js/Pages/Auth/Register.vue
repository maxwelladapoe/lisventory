<template>
    <GuestLayout>
        <Head title="Log in" />
        <v-form @submit.prevent="submit">
            <div>
                <v-label>Name</v-label>
                <v-text-field
                    v-model="form.name"
                    type="text"
                    placeholder="Full name"
                    prepend-inner-icon="mdi-account"
                    :error-messages="form.errors.name"
                />
            </div>

            <div>
                <v-label>Email</v-label>
                <v-text-field
                    v-model="form.email"
                    type="email"
                    placeholder="Email address"
                    prepend-inner-icon="mdi-email-outline"
                    :error-messages="form.errors.email"
                />
            </div>

            <div>
                <v-label>Password</v-label>
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

            <div>
                <v-label>Password Confirmation</v-label>
                <v-text-field
                    v-model="form.password_confirmation"
                    placeholder="Enter your password"
                    prepend-inner-icon="mdi-lock-outline"
                    :append-inner-icon="
                        showPassword ? 'mdi-eye-off' : 'mdi-eye'
                    "
                    :type="showPassword ? 'text' : 'password'"
                    :error-messages="form.errors.password_confirmation"
                    @click:append-inner="showPassword = !showPassword"
                />
            </div>

            <v-btn
                :loading="form.processing"
                type="submit"
                block
                size="large"
                flat
                class="mb-5 mt-3"
                >Register</v-btn
            >
        </v-form>

        <h6
            class="text-h6 text-muted font-weight-medium d-flex justify-center align-center mt-3"
        >
            Already registered?
            <Link
                href="/login"
                class="text-primary text-decoration-none text-body-1 opacity-1 font-weight-medium pl-2"
            >
                Login</Link
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
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});
const showPassword = ref(false);

const submit = () => {
    form.post("/register", {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

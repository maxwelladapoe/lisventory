<template>
    <div class="py-6">
        <h2 class="font-bold text-2xl mb-6">
            {{ props.isEditing ? "Edit customer" : "Add customer" }}
        </h2>

        <div class="w-full form-content relative">
            <div
                v-show="!isEditing && isSuccessful"
                class="absolute z-2 bg-white w-full h-full"
            >
                <div class="h-full w-full flex flex-col justify-between">
                    <div
                        class="flex-1 flex flex-col items-center justify-center"
                    >
                        <div>
                            <CircleCheckIcon
                                size="150"
                                class="text-success mx-auto"
                                stroke-width="1"
                            />
                        </div>
                        <p class="my-4 text-xl font-bold text-center">
                            Your Customer has been added successfully
                        </p>
                    </div>

                    <div class="w-full mt-6 space-x-4 flex justify-end">
                        <button class="btn btn-outline" @click="addAnother">
                            Add another
                        </button>
                        <button
                            class="btn btn-success"
                            @click="emits('submissionSuccess')"
                        >
                            Done
                        </button>
                    </div>
                </div>
            </div>

            <v-form @submit="onSubmit" ref="addCustomerFormRef">
                <div class="flex flex-col md:flex-row md:space-x-4 w-full">
                    <div class="w-full md:w-6/12">
                        <v-text-field
                            label="First name"
                            placeholder="First name"
                            name="firstName"
                            v-model="form.first_name"
                        />
                    </div>
                    <div class="w-full md:w-6/12">
                        <v-text-field
                            label="Last name"
                            placeholder="Last name"
                            name="lastName"
                            v-model="form.last_name"
                        />
                    </div>
                </div>

                <div class="flex flex-col md:flex-row md:space-x-4 w-full">
                    <div class="w-full md:w-6/12">
                        <v-text-field
                            type="email"
                            label="Email"
                            placeholder="Enter email"
                            name="email"
                            v-model="form.email"
                        />
                    </div>
                    <div class="w-full md:w-6/12">
                        <v-text-field
                            type="tel"
                            label="Mobile number"
                            placeholder="Mobile number"
                            name="mobileNo"
                            v-model="form.mobile_no"
                        />
                    </div>
                </div>

                <div>
                    <v-textarea
                        rows="3"
                        label="Address"
                        placeholder="Enter the address"
                        name="address"
                        :resize="false"
                        v-model="form.address"
                    />
                </div>

                <div class="w-full mt-6">
                    <v-btn class="btn btn-success w-full" type="submit">
                        {{ props.isEditing ? "Update" : "Add" }} customer
                    </v-btn>
                </div>
            </v-form>
        </div>
    </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import { useToast } from "vue-toastification";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    selectedItem: {
        type: Object,
        required: false,
        default: () => {
            return {};
        },
    },
    isEditing: {
        type: Boolean,
        default: false,
    },
});

const emits = defineEmits(["submissionSuccess"]);
const toast = useToast();
const isSuccessful = ref(false);

const form = useForm({
    first_name: "",
    last_name: "",
    email: "",
    mobile_no: "",
    address: "",
});

const onSubmit = () => {
    if (props.selectedItem && props.isEditing) {
        form.put(`/customers/update/${props.selectedItem.id}`, {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                isSuccessful.value = true;
            },
        });
    } else {
        form.post("/customers/store", {
            preserveScroll: true,
            onSuccess: () => {
                isSuccessful.value = true;
            },
        });
    }
};

onMounted(() => {
    if (props.selectedItem && props.isEditing) {
        form.first_name = props.selectedItem.first_name;
        form.last_name = props.selectedItem.last_name;
        form.email = props.selectedItem.email;
        form.mobile_no = props.selectedItem.mobile_no;
        form.address = props.selectedItem.address;
    }
});

const addAnother = () => {
    isSuccessful.value = false;
};

const reset = () => {
    addCustomerFormRef.value.resetForm();
    isSuccessful.value = false;
};
defineExpose({ reset });
</script>

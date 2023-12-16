<template>
    <v-form @submit.prevent="onSubmit" ref="addCustomerFormRef">
        <v-row>
            <v-col cols="12" md="6">
                <v-label text="First name" />
                <v-text-field
                    placeholder="First name"
                    name="firstName"
                    v-model="form.first_name"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-label text="Last name" />
                <v-text-field
                    placeholder="Last name"
                    name="lastName"
                    v-model="form.last_name"
                />
            </v-col>
        </v-row>

        <v-row>
            <v-col cols="12" md="6">
                <v-label text="Email" />
                <v-text-field
                    type="email"
                    placeholder="Enter email"
                    name="email"
                    v-model="form.email"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-label text="Mobile number" />
                <v-text-field
                    type="tel"
                    placeholder="Mobile number"
                    name="mobileNo"
                    v-model="form.mobile_no"
                />
            </v-col>
        </v-row>

        <v-row>
            <v-col cols="12">
                <v-label text="Address" />
                <v-textarea
                    rows="3"
                    placeholder="Enter the address"
                    name="address"
                    :resize="false"
                    v-model="form.address"
                />
            </v-col>
        </v-row>

        <div class="w-full mt-6">
            <v-btn type="submit">
                {{ props.isEditing ? "Update" : "Add" }} customer
            </v-btn>
        </div>
    </v-form>
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

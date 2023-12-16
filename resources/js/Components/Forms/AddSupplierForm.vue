<template>
    <v-form @submit.prevent="onSubmit" ref="addSupplierFormRef">
        <v-row>
            <v-col cols="12">
                <v-label text="Name" />
                <v-text-field
                    placeholder="Name"
                    name="name"
                    v-model="form.name"
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
                    v-model="form.mobileNo"
                />
            </v-col>

            <v-col cols="12">
                <v-label text="Location" />
                <v-text-field
                    type="text"
                    placeholder="Enter Location"
                    name="location"
                    v-model="form.location"
                />
            </v-col>

            <v-col cols="12">
                <v-label text="Address" />
                <v-textarea
                    rows="3"
                    placeholder="Enter the address"
                    name="address"
                    v-model="form.address"
                />
            </v-col>
        </v-row>

        <div class="w-full mt-6">
            <v-btn type="submit">
                {{ props.isEditing ? "Update" : "Add" }} supplier
            </v-btn>
        </div>
    </v-form>
</template>
<script setup>
import { ref } from "vue";
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
const addSupplierFormRef = ref();
const isSuccessful = ref(false);

const form = useForm({
    name: "",
    email: "",
    mobileNo: "",
    address: "",
    location: "",
});

const onSubmit = () => {
    if (props.selectedItem && props.isEditing) {
        form.put(`/suppliers/update/${props.selectedItem.id}`, {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                isSuccessful.value = true;
            },
        });
    } else {
        form.post("/suppliers/store", {
            preserveScroll: true,
            onSuccess: () => {
                isSuccessful.value = true;
            },
        });
    }
};

const addAnother = () => {
    isSuccessful.value = false;
};

const reset = () => {
    addSupplierFormRef.value.resetForm();
    isSuccessful.value = false;
};
defineExpose({ reset });
</script>

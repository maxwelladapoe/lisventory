<template>
    <template v-if="form.progress">
        <v-progress-linear :model-value="form.progress.percentage" />
    </template>
    <v-form @submit.prevent="onSubmit" ref="addItemForm" class="space-y-2">
        <v-row>
            <v-col cols="12">
                <v-label>Name</v-label>
                <v-text-field
                    placeholder="The name of the item"
                    name="name"
                    v-model="form.name"
                    :error-messages="form.errors.name"
            /></v-col>

            <v-col cols="12" md="2" sm="4">
                <v-label>Currency</v-label>
                <v-combobox
                    placeholder="Select a currency"
                    name="currency"
                    :items="currencyItems"
                    v-model="form.currency"
                    :error-messages="form.errors.currency"
                />
            </v-col>
            <v-col cols="12" md="5" sm="4">
                <v-label>Purchase price</v-label>
                <v-text-field
                    type="number"
                    placeholder="Purchase price of the item"
                    name="purchasePrice"
                    v-model="form.purchase_price"
                    :error-messages="form.errors.purchase_price"
                />
            </v-col>
            <v-col cols="12" md="5" sm="4">
                <v-label>Resell price</v-label>
                <v-text-field
                    type="number"
                    placeholder="Resell price of the item"
                    name="resellPrice"
                    v-model="form.resell_price"
                    :error-messages="form.errors.resell_price"
                />
            </v-col>

            <v-col cols="12" sm="6">
                <v-label>Category</v-label>
                <v-select
                    placeholder="Select a category"
                    name="categoryId"
                    v-model="form.category_id"
                    :error-messages="form.errors.category_id"
                >
                    <!-- <option
                                v-for="category in categories"
                                :key="category.name"
                                :value="category.id"
                            >
                                {{ category.name }}
                            </option> -->
                </v-select>
            </v-col>
            <v-col cols="12" sm="6">
                <v-label>Quantity</v-label>
                <v-text-field
                    type="number"
                    placeholder="Quantity of items"
                    name="quantity"
                    v-model="form.quantity"
                    :error-messages="form.errors.quantity"
                />
            </v-col>

            <v-col cols="12">
                <v-label>Description</v-label>
                <v-textarea
                    placeholder="You can add any extra details here "
                    rows="3"
                    :resize="false"
                    name="description"
                    v-model="form.description"
                    :error-messages="form.errors.description"
                />
            </v-col>

            <v-col cols="12">
                <v-label>Item images (only images are allowed)</v-label>
                <v-file-input
                    name="attachments"
                    multiple
                    maxNumFiles="5"
                    class="mb-6"
                    variant="outlined"
                    v-model="form.attachments"
                    :error-messages="form.errors.attachments"
                />
            </v-col>
        </v-row>
        <div class="mt-6">
            <v-btn
                type="submit"
                :disabled="form.processing"
                :loading="form.processing"
                color="primary"
                elevation="0"
                size="large"
            >
                {{ isEditing ? "Update" : "Add Item" }}
            </v-btn>
        </div>
    </v-form>
</template>
<script setup>
import * as Yup from "yup";
import { ref, computed } from "vue";
import CountryCurrency from "@/Data/Currencies.json";
import { useToast } from "vue-toastification";
import { useForm } from "@inertiajs/vue3";

const emits = defineEmits(["submissionSuccess"]);

const props = defineProps({
    categories: {
        type: Array,
        default: [],
    },
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
const toast = useToast();

const isSuccessful = ref(false);
const validationSchema = Yup.object().shape({
    name: Yup.string().required().label("Item name"),
    currency: Yup.string().required().label("Currency"),
    categoryId: Yup.number().label("Category"),
    quantity: Yup.number().required().label("Quantity"),
    purchasePrice: Yup.number().min(0.01).required().label("Purchase price"),
    resellPrice: Yup.number().min(0.01).required().label("Resell price"),
    description: Yup.string().label("Item description"),
    attachments: Yup.mixed().label("attachments"),
});

const form = useForm({
    name: null,
    currency: null,
    category_id: null,
    quantity: null,
    purchase_price: null,
    resell_price: null,
    description: null,
    attachments: null,
});

const initialData = {
    currency: "",
};

const onSubmit = () => {
    form.post("/inventory/store", {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            isSuccessful.value = true;
        },
    });
};

const addAnother = () => {
    isSuccessful.value = false;
};
const reset = () => {
    addItemForm.value.resetForm();
    isSuccessful.value = false;
};

const currencyItems = computed(() => {
    return CountryCurrency.map((cc) => cc.currencyCode);
});
</script>

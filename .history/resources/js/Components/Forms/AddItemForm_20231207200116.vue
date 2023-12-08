<template>
    <div class="py-6">
        <!-- <h2 class="font-bold text-2xl mb-6">
            {{ props.isEditing ? "Edit item" : "Add Item to inventory" }}
        </h2> -->

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
                            Your Item has been added successfully
                        </p>
                    </div>

                    <div class="w-full mt-6 space-x-4 flex justify-end">
                        <button class="btn btn-outline" @click="addAnother">
                            Add another item
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

            <v-form
                @submit="onSubmit"
                :validation-schema="validationSchema"
                :initialValues="initialData"
                ref="addItemForm"
                class="space-y-2"
            >
                <v-container>
                    <div>
                        <v-text-field
                            variant="outlined"
                            label="Name"
                            placeholder="The name of the item"
                            name="name"
                            v-model="form.name"
                        />
                    </div>

                    <v-row>
                        <v-col cols="12" md="2" sm="4">
                            <v-select
                                label="Currency"
                                placeholder="Select a currency"
                                name="currency"
                                variant="outlined"
                                v-model=""
                            >
                                <!-- <option
                                v-for="CounCur in CountryCurrency"
                                :key="CounCur.id"
                                :value="CounCur.currency_code"
                            >
                                {{ CounCur.currency_code }} -
                                {{ CounCur.currency_name }}
                            </option> -->
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="5" sm="4">
                            <v-text-field
                                variant="outlined"
                                type="number"
                                label="Purchase price"
                                placeholder="Purchase price of the item"
                                name="purchasePrice"
                            />
                        </v-col>
                        <v-col cols="12" md="5" sm="4">
                            <v-text-field
                                variant="outlined"
                                type="number"
                                label="Resell price"
                                placeholder="Resell price of the item"
                                name="resellPrice"
                            />
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="12" sm="6">
                            <v-select
                                label="Category"
                                placeholder="Select a category"
                                name="categoryId"
                                variant="outlined"
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
                            <v-text-field
                                variant="outlined"
                                type="number"
                                label="Quantity"
                                placeholder="Quantity of items"
                                name="quantity"
                            />
                        </v-col>
                    </v-row>

                    <div>
                        <v-textarea
                            placeholder="You can add any extra details here "
                            rows="3"
                            :resize="false"
                            label="Description"
                            name="description"
                            variant="outlined"
                        />
                    </div>

                    <div>
                        <v-file-input
                            name="attachments"
                            multiple
                            label="Item images (only images are allowed)"
                            maxNumFiles="5"
                            class="mb-6"
                            variant="outlined"
                        />
                    </div>

                    <div class="w-full mt-6">
                        <v-btn class="btn btn-success w-full" type="submit">
                            {{ isEditing ? "Update" : "Add Item" }}
                        </v-btn>
                    </div>
                </v-container>
            </v-form>
        </div>
    </div>
</template>
<script setup>
import * as Yup from "yup";
import { ref, reactive } from "vue";

// import CountryCurrency from "@/assets/data/currencies.json";
import { useToast } from "vue-toastification";

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
const addItemForm = ref();

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

const form = reactive({
    name: null,
    currency: null,
    categoryId: null,
});

const initialData = {
    currency: "",
};

const onSubmit = (values, actions) => {};

const addAnother = () => {
    isSuccessful.value = false;
};
const reset = () => {
    addItemForm.value.resetForm();
    isSuccessful.value = false;
};
</script>

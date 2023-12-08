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

            <form
                @submit="onSubmit"
                :validation-schema="validationSchema"
                :initialValues="initialData"
                ref="addItemForm"
                class="space-y-2"
            >
                <div>
                    <v-text-field
                        label="Name"
                        placeholder="The name of the item"
                        name="name"
                    />
                </div>

                <div class="flex flex-col md:flex-row md:space-x-4 w-full">
                    <div class="w-full md:w-4/12">
                        <SelectInput
                            label="Currency"
                            placeholder="Select a currency"
                            name="currency"
                        >
                            <option
                                v-for="CounCur in CountryCurrency"
                                :key="CounCur.id"
                                :value="CounCur.currency_code"
                            >
                                {{ CounCur.currency_code }} -
                                {{ CounCur.currency_name }}
                            </option>
                        </SelectInput>
                    </div>
                    <div class="w-full md:w-4/12">
                        <v-text-field
                            type="number"
                            label="Purchase price"
                            placeholder="Purchase price of the item"
                            name="purchasePrice"
                        />
                    </div>
                    <div class="w-full md:w-4/12">
                        <v-text-field
                            type="number"
                            label="Resell price"
                            placeholder="Resell price of the item"
                            name="resellPrice"
                        />
                    </div>
                </div>

                <div class="flex flex-col md:flex-row md:space-x-4 w-full">
                    <div class="w-full md:w-6/12">
                        <SelectInput
                            label="Category"
                            placeholder="Select a category"
                            name="categoryId"
                        >
                            <option
                                v-for="category in categoryStore.categories"
                                :key="category.name"
                                :value="category.id"
                            >
                                {{ category.name }}
                            </option>
                        </SelectInput>
                    </div>
                    <div class="w-full md:w-6/12">
                        <v-text-field
                            type="number"
                            label="Quantity"
                            placeholder="Quantity of items"
                            name="quantity"
                        />
                    </div>
                </div>

                <div>
                    <TextAreaField
                        placeholder="You can add any extra details here "
                        rows="3"
                        :resize="false"
                        label="Description"
                        name="description"
                    />
                </div>

                <div>
                    <DropZoneField
                        name="attachments"
                        label="Item images (only images are allowed)"
                        maxNumFiles="5"
                        class="mb-6"
                    />
                </div>

                <div class="w-full mt-6">
                    <button class="btn btn-success w-full" type="submit">
                        {{ props.isEditing ? "Update" : "Add Item" }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<script setup>
import { Form } from "vee-validate";
import * as Yup from "yup";
import { ref } from "vue";

// import CountryCurrency from "@/assets/data/currencies.json";
import { useToast } from "vue-toastification";

const emits = defineEmits(["submissionSuccess"]);

const props = defineProps({
    categories: {
        type: Array,
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
const isEditing = ref(false);
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

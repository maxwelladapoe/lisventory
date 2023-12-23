<template>
    <Head title="Point of Sale" />
    <AuthenticatedLayout hide-header>
        <v-card title="Point of Sale">
            <v-divider />
            <v-card-item>
                <v-row>
                    <v-col cols="12" lg="8">
                        <v-row>
                            <template
                                v-for="inventoryItem in inventoryItems"
                                :key="`inventory-item-${inventoryItem.id}`"
                            >
                                <v-col cols="12" sm="6" md="4" xl="3">
                                    <div class="border rounded-lg">
                                        <v-img
                                            height="100"
                                            src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                                            cover
                                        >
                                        </v-img>

                                        <div class="pa-2">
                                            <p>
                                                {{ inventoryItem.name }}
                                            </p>
                                            <p class="text-body-2">
                                                9 available in stock
                                            </p>

                                            <v-btn
                                                color="primary"
                                                block
                                                class="mt-2"
                                                @click="addItem(inventoryItem)"
                                            >
                                                Add Item
                                            </v-btn>
                                        </div>
                                    </div>
                                </v-col>
                            </template>
                        </v-row>
                    </v-col>
                    <v-divider vertical />

                    <v-col cols="12" lg="4">
                        <div>
                            <p class="pb-2">Order Items</p>
                            <v-divider />
                        </div>
                        <template v-if="posForm.selectedItems.length">
                            <template
                                v-for="(
                                    selectedItem, i
                                ) in posForm.selectedItems"
                                :key="`${i}-selected-item`"
                            >
                                <div
                                    class="pa-4 d-flex justify-space-between align-start"
                                >
                                    <div class="d-flex flex-no-wrap">
                                        <v-avatar
                                            size="50"
                                            rounded="0"
                                            class="mr-2"
                                        >
                                            <v-img
                                                src="https://cdn.vuetifyjs.com/images/cards/halcyon.png"
                                            />
                                        </v-avatar>
                                        <div>
                                            <div class="text-h6">
                                                {{ selectedItem.item.name }}
                                            </div>

                                            <span class="text-body-1">
                                                Price :
                                                {{ selectedItem.item.currency }}
                                                {{
                                                    selectedItem.item
                                                        .resell_price
                                                }}
                                                x
                                                <span
                                                    class="font-weight-bold"
                                                    >{{
                                                        selectedItem.purchase_quantity
                                                    }}</span
                                                >
                                            </span>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="text-body-1">
                                            <div
                                                class="d-flex mr-2 flex-no-wrap"
                                            >
                                                <v-btn
                                                    size="x-small"
                                                    icon="mdi-minus"
                                                    class="mr-1"
                                                    @click="
                                                        selectedItem.purchase_quantity -= 1
                                                    "
                                                />
                                                <v-btn
                                                    icon="mdi-plus"
                                                    size="x-small"
                                                    @click="
                                                        selectedItem.purchase_quantity += 1
                                                    "
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <v-divider />
                            </template>

                            <v-row class="d-flex mt-3 px-4">
                                <v-col cols="12" lg="5">
                                    <v-textarea
                                        rows="3"
                                        resize="false"
                                        class="w-100"
                                    />
                                </v-col>
                                <v-divider vertical />
                                <v-col cols="12" lg="7"
                                    ><div class="text-right">
                                        <div>
                                            Sub Total: {{ orderSubTotal }}
                                        </div>
                                        <div>Tax: 0</div>
                                        <div>Discount: 0</div>
                                        <div class="font-weight-black">
                                            Grand Total: 0
                                        </div>
                                    </div></v-col
                                >
                            </v-row>
                        </template>

                        <template v-else>
                            <v-icon icon="mdi-folder" />
                            <div class="pa-2">No items selected yet</div>
                        </template>
                    </v-col>
                </v-row>
            </v-card-item>
        </v-card>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";

const page = usePage();

const inventoryItems = computed(() => page.props.inventory);
const posForm = useForm({
    selectedItems: [],
});

const orderSubTotal = computed(() => {
    return posForm.selectedItems
        .map((item) => item.item.resell_price * item.purchase_quantity)
        .reduce((accumulator, currentValue) => {
            return accumulator + currentValue;
        }, 0);
});

function addItem(inventoryItem) {
    const index = posForm.selectedItems.findIndex(
        (item) => item.item.id === inventoryItem.id
    );
    if (index > -1) {
        posForm.selectedItems[index].purchase_quantity += 1;
    } else {
        posForm.selectedItems.push({
            item: inventoryItem,
            purchase_quantity: 1,
        });
    }
}
</script>

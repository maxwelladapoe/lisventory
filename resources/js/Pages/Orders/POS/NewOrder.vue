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
                                <v-col cols="12" md="2" xl="3">
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
                    <v-divider vertical></v-divider>
                    <v-col cols="12" lg="4">
                        <template
                            v-for="(selectedItem, i) in posForm.selectedItems"
                            :key="`${i}-selected-item`"
                        >
                            <v-card density="compact" flat>
                                <v-card-item>
                                    <div
                                        class="d-flex flex-no-wrap justify-space-between"
                                    >
                                        <div>
                                            <v-card-title class="text-h6">
                                                {{ selectedItem.item.name }}
                                            </v-card-title>

                                            <v-card-subtitle>
                                                Price :
                                                {{ selectedItem.item.currency }}
                                                {{
                                                    selectedItem.item
                                                        .resell_price
                                                }}
                                                x
                                                {{
                                                    selectedItem.purchase_quantity
                                                }}
                                            </v-card-subtitle>

                                            <div class="mt-3 w-50">
                                                <v-text-field
                                                    label="Quantity"
                                                    v-model="
                                                        selectedItem.purchase_quantity
                                                    "
                                                    type="number"
                                                    density="compact"
                                                />
                                            </div>
                                        </div>

                                        <v-avatar size="110" rounded="0">
                                            <v-img
                                                src="https://cdn.vuetifyjs.com/images/cards/halcyon.png"
                                            />
                                        </v-avatar>
                                    </div>
                                </v-card-item>
                            </v-card>
                            <v-divider />
                        </template>

                        <div>
                            
                        </div>
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

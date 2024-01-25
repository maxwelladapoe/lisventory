<template>
    <Head title="Point of Sale" />
    <AuthenticatedLayout hide-header>
        <v-row>
            <v-col cols="12" lg="8">
                <v-card flat rounded="lg">
                    <v-toolbar>
                        <v-toolbar-title>POS</v-toolbar-title>

                        <v-spacer />

                        <!-- <v-btn icon>
                            <v-icon>mdi-magnify</v-icon>
                        </v-btn> -->

                        <template v-slot:extension>
                            <v-tabs v-model="selectedTab" class="px-4">
                                <v-tab
                                    v-for="tabItem in tabItems"
                                    :key="tabItem"
                                    :value="tabItem"
                                >
                                    {{ tabItem }}
                                </v-tab>
                            </v-tabs>
                        </template>
                    </v-toolbar>

                    <v-window v-model="selectedTab">
                        <v-window-item
                            v-for="item in tabItems"
                            :key="`${item}-window`"
                            :value="item"
                        >
                            <v-card flat>
                                <v-card-item>
                                    <v-row>
                                        <template
                                            v-for="inventoryItem in inventoryItems"
                                            :key="`inventory-item-${inventoryItem.id}`"
                                        >
                                            <v-col
                                                cols="12"
                                                sm="6"
                                                md="4"
                                                xl="3"
                                            >
                                                <v-card flat>
                                                    <v-img
                                                        height="100"
                                                        src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                                                        cover
                                                    >
                                                    </v-img>
                                                    <v-card-item>
                                                        <div>
                                                            <p>
                                                                {{
                                                                    inventoryItem.name
                                                                }}
                                                            </p>
                                                            <p
                                                                class="text-body-2"
                                                            >
                                                                9 available in
                                                                stock
                                                            </p>

                                                            <v-btn
                                                                color="primary"
                                                                block
                                                                class="mt-2"
                                                                @click="
                                                                    addItem(
                                                                        inventoryItem
                                                                    )
                                                                "
                                                            >
                                                                Add Item
                                                            </v-btn>
                                                        </div>
                                                    </v-card-item>
                                                </v-card>
                                            </v-col>
                                        </template>
                                    </v-row>
                                </v-card-item>
                            </v-card>
                        </v-window-item>
                    </v-window>
                </v-card>
            </v-col>

            <v-col cols="12" lg="4">
                <v-card title="Ordered Items">
                    <v-card-item>
                        <template v-if="posForm.selectedItems.length">
                            <template
                                v-for="(
                                    selectedItem, i
                                ) in posForm.selectedItems"
                                :key="`${i}-selected-item`"
                            >
                                <div class="pa-4">
                                    <div
                                        class="d-flex justify-space-between align-start"
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
                                                    {{
                                                        selectedItem.item
                                                            .currency
                                                    }}
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

                                        <div></div>
                                    </div>

                                    <div
                                        class="d-flex justify-space-between no-wrap mt-4"
                                    >
                                        <div>
                                            <div class="text-body-1">
                                                <div
                                                    class="d-flex mr-2 flex-no-wrap align-center"
                                                >
                                                    <v-btn
                                                        size="x-small"
                                                        icon="mdi-minus"
                                                        class="mr-1"
                                                        @click="
                                                            selectedItem.purchase_quantity >
                                                            0
                                                                ? (selectedItem.purchase_quantity -= 1)
                                                                : 0
                                                        "
                                                    />

                                                    <div>
                                                        <v-badge
                                                            color="info"
                                                            :content="
                                                                selectedItem.purchase_quantity
                                                            "
                                                            class="h-100"
                                                            inline
                                                        ></v-badge>
                                                    </div>
                                                    <v-btn
                                                        icon="mdi-plus"
                                                        size="x-small"
                                                        class="ml-1"
                                                        @click="
                                                            selectedItem.purchase_quantity += 1
                                                        "
                                                    />
                                                </div>
                                            </div>
                                        </div>

                                        <v-btn
                                            icon="mdi-trash-can"
                                            color="error"
                                            size="x-small"
                                            variant="outlined"
                                            rounded="xl
"
                                        />
                                    </div>
                                </div>

                                <v-divider />
                            </template>

                            <div class="mt-3 px-4">
                                <div>
                                    <v-btn
                                        append-icon="mdi-pencil"
                                        :text="`${
                                            addNote ? 'Add' : 'Hide'
                                        } note`"
                                        size="small"
                                        variant="plain"
                                        class="ml-auto mb-1"
                                        @click="addNote = !addNote"
                                    />

                                    <template v-if="addNote">
                                        <v-textarea
                                            rows="2"
                                            resize="false"
                                            class="w-100"
                                            no-resize
                                        />
                                        <v-divider class="my-4" />
                                    </template>
                                </div>

                                <div>
                                    <div class="text-right">
                                        <div>
                                            Sub Total: {{ orderSubTotal }}
                                        </div>
                                        <div>Tax: 0</div>
                                        <div>Discount: 0</div>
                                        <div class="font-weight-black">
                                            Grand Total: 0
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template v-else>
                            <div class="pa-2 text-center text-grey">
                                <v-icon
                                    icon="mdi-folder"
                                    class="mx-auto"
                                    color="grey"
                                />
                                <div>No items added yet</div>
                            </div>
                        </template>
                    </v-card-item>
                </v-card>
            </v-col>
        </v-row>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";

const page = usePage();

const tabItems = ["web", "shopping", "videos", "images", "news"];
const selectedTab = ref("web");
const addNote = ref(false);

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

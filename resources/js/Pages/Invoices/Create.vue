<template>
    <Head title="Create Invoice" />
    <AuthenticatedLayout hide-header>
        <v-row>
            <v-col cols="12" md="9">
                <v-card>
                    <v-card-text
                        class="d-flex flex-wrap justify-space-between gap-y-5 flex-column flex-sm-row"
                    >
                        <div class="mb-6">
                            <div class="d-flex align-center mb-6">
                                <ApplicationLogo height="30" />
                            </div>
                            <p class="mb-0">
                                Office 149, 450 South Brand Brooklyn
                            </p>
                            <p class="mb-0">San Diego County, CA 91905, USA</p>
                            <p class="mb-0">
                                +1 (123) 456 7891, +44 (876) 543 2198
                            </p>
                        </div>
                        <div class="mb-3">
                            <div
                                class="d-flex align-center justify-sm-end mb-3"
                            >
                                <v-text-field
                                    density="compact"
                                    placeholder="#5046"
                                    hide-details="auto"
                                    style="inline-size: 18rem"
                                >
                                    <template #prepend>
                                        <v-label
                                            text="Invoice:"
                                            class="text-h4 uppercase"
                                        />
                                    </template>
                                </v-text-field>
                            </div>

                            <div
                                class="d-flex align-center justify-sm-end mb-3"
                            >
                                <v-text-field
                                    density="compact"
                                    placeholder="YYYY-MM-DD"
                                    style="inline-size: 18rem"
                                    hide-details="auto"
                                >
                                    <template #prepend>
                                        <p class="text-body-1">Date Issued:</p>
                                    </template>
                                </v-text-field>
                            </div>

                            <div
                                class="d-flex align-center justify-sm-end mb-3"
                            >
                                <v-text-field
                                    density="compact"
                                    placeholder="YYYY-MM-DD"
                                    style="inline-size: 18rem"
                                >
                                    <template #prepend>
                                        <p class="text-body-1">Due Date:</p>
                                    </template>
                                </v-text-field>
                            </div>
                        </div>
                    </v-card-text>
                    <hr
                        class="v-divider v-theme--light mb-2"
                        aria-orientation="horizontal"
                        role="separator"
                    />
                    <div
                        class="v-card-text d-flex flex-wrap justify-space-between flex-column flex-sm-row gap-y-5"
                    >
                        <div class="mb-4 mb-sm-0" style="inline-size: 15.5rem">
                            <v-autocomplete
                                dirty
                                label="Invoice To:"
                                hint="Select a customer"
                                density="compact"
                            />
                        </div>

                        <div>
                            <h6 class="text-sm font-weight-medium mb-3">
                                Bill To:
                            </h6>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-6">Total Due:</td>
                                        <td>$12,110.55</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-6">Bank Name:</td>
                                        <td>American Bank</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-6">Country:</td>
                                        <td>United States</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-6">IBAN:</td>
                                        <td>ETD95476213874685</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-6">SWIFT Code:</td>
                                        <td>BR91905</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr
                        class="v-divider v-theme--light"
                        aria-orientation="horizontal"
                        role="separator"
                    />
                    <v-card-text class="add-products-form">
                        <div class="mb-4">
                            <div
                                class="add-products-header mb-2 d-none d-md-flex ps-5 pe-16"
                            >
                                <div class="v-row font-weight-medium">
                                    <div class="v-col-md-6 v-col-12">
                                        <p class="text-h6 font-weight-medium">
                                            Item
                                        </p>
                                    </div>
                                    <div class="v-col-md-2 v-col-12">
                                        <p class="text-h6 font-weight-medium">
                                            Cost
                                        </p>
                                    </div>
                                    <div class="v-col-md-2 v-col-12">
                                        <p class="text-h6 font-weight-medium">
                                            Hours
                                        </p>
                                    </div>
                                    <div class="v-col-md-2 v-col-12">
                                        <p class="text-h6 font-weight-medium">
                                            Price
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <v-card class="d-flex">
                                <div class="pa-5 flex-grow-1">
                                    <v-row>
                                        <v-col cols="12" md="6">
                                            <v-autocomplete
                                                dirty
                                                label="Select Item"
                                                density="compact"
                                                class="mb-3"
                                            />

                                            <v-textarea
                                                density="compact"
                                                dirty
                                                rows="3"
                                                label="Description"
                                            />
                                        </v-col>
                                        <v-col cols="12" sm="4" md="2">
                                            <v-text-field
                                                dirty
                                                label="Cost"
                                                density="compact"
                                            />

                                            <div class="text-body-2 mt-5">
                                                <p class="mb-1">Discount</p>
                                                <span>0%</span
                                                ><span
                                                    class="mx-2"
                                                    aria-describedby="v-tooltip-342"
                                                >
                                                    0%
                                                    <!----></span
                                                ><span
                                                    aria-describedby="v-tooltip-343"
                                                >
                                                    0%
                                                    <!----></span
                                                >
                                            </div>
                                        </v-col>
                                        <v-col cols="12" sm="4" md="2">
                                            <v-text-field
                                                dirty
                                                label="Hours"
                                                density="compact"
                                            />
                                        </v-col>
                                        <v-col cols="12" sm="4" md="2">
                                            <p class="my-2">
                                                <span class="d-inline d-md-none"
                                                    >Price: </span
                                                ><span class="text-body-1"
                                                    >$0</span
                                                >
                                            </p>
                                        </v-col>
                                    </v-row>
                                </div>
                                <div
                                    class="d-flex flex-column item-actions pa-1 border-s"
                                >
                                    <v-btn
                                        color="plain"
                                        icon="mdi-close"
                                        roundex="xl"
                                    />
                                </div>
                            </v-card>
                        </div>
                        <v-btn prepend-icon="mdi-plus"> Add Item </v-btn>
                    </v-card-text>
                    <v-divider
                        class="my-2"
                        orientation="horizontal"
                        role="separator"
                    />
                    <v-card-text
                        class="d-flex justify-space-between flex-wrap flex-column flex-sm-row"
                    >
                        <div class="mb-6 mb-sm-0">
                            <div class="d-flex align-center mb-4">
                                <v-label text="Salesperson:" class="me-3" />
                                <v-text-field
                                    density="compact"
                                    style="inline-size: 9rem"
                                />
                            </div>
                            <v-text-field
                                density="compact"
                                placeholder="Thanks for your business"
                            />
                        </div>
                        <div>
                            <table class="w-100">
                                <tr>
                                    <td class="pe-16">Subtotal:</td>
                                    <td class="text-end">
                                        <h6 class="text-sm font-weight-medium">
                                            $1800
                                        </h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-16">Discount:</td>
                                    <td class="text-end">
                                        <h6 class="text-sm font-weight-medium">
                                            $28
                                        </h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-16">Tax:</td>
                                    <td class="text-end">
                                        <h6 class="text-sm font-weight-medium">
                                            21%
                                        </h6>
                                    </td>
                                </tr>
                            </table>
                            <hr
                                class="v-divider v-theme--light mt-4 mb-3"
                                aria-orientation="horizontal"
                                role="separator"
                            />
                            <table class="w-100">
                                <tr>
                                    <td>Total:</td>
                                    <td class="text-end">
                                        <h6 class="text-sm font-weight-medium">
                                            $1690
                                        </h6>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </v-card-text>
                    <v-divider
                        class="mt-2"
                        orientation="horizontal"
                        role="separator"
                    />
                    <v-card-text class="v-card-text">
                        <v-label text="Note:" />
                        <v-textarea />
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col cols="12" md="3">
                <v-card>
                    <v-card-text>
                        <v-btn prepend-icon="mdi-send" class="mb-3" block
                            >Send Invoice</v-btn
                        >
                        <Link :as="vBtn" href="/hellooo" class="d-block">
                            Preview
                        </Link>
                        <v-btn variant="outlined" block> Save </v-btn>
                    </v-card-text>
                </v-card>

                <v-select label="Accept Payment Via" dirty class="my-6" />

                <div class="d-flex align-center justify-space-between pa-0">
                        <div><v-label for="payment-terms" text="Payment Terms" /></div>
                    <div><v-switch dirty /></div>
                </div>
                <div class="d-flex align-center justify-space-between pa-0">
                       <div><v-label text="Client Notes" for="client-notes" /></div> 
                    <div><v-switch dirty /></div>
                </div>
                <div class="d-flex align-center justify-space-between pa-0">
                    <div>
                        <v-label
                            text="Payment Stub"
                            for="payment-stub"
                            class="ma-0 pa-0 block"
                        />
                    </div>
                    <div>
                        <v-switch dirty />
                    </div>
                </div>
            </v-col>
        </v-row>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

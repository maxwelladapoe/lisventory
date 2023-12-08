<template>
    <Head title="Create Inventory" />
    <AuthenticatedLayout title="Create Inventory">
        <div>
            
            <v-row>
              <v-col cols="12" md="2" sm="4">
     <AddItemForm categories="categories" />
                </v-col>

            </v-row>
       
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import AddItemForm from "@/Components/Forms/AddItemForm.vue";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();
const categories = computed(()=>{
  return page.props.categories
})

</script>

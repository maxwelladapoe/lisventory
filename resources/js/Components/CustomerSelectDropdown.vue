<template>
    <v-autocomplete
        label="Select Customer"
        placeholder="Select a customer"
        density="compact"
        :items="results"
        item-title="name"
        item-value="id"
        @update:search="debouncedFn"
    />
</template>
<script setup>
import { onMounted } from "vue";
import { ref } from "vue";
import { useDebounceFn } from "@vueuse/core";

const results = ref([]);
onMounted(async () => {
    await search();
});

const debouncedFn = useDebounceFn((searchTerm) => {
    // search
    search(searchTerm);
}, 2000);

function search(searchTerm = "") {
    let searchPath = route("customers.search");
    if (searchTerm) {
        searchPath = `${searchPath}/?search=${searchTerm}`;
    }
    axios.get(searchPath).then(({ data }) => {
        results.value = data.customers.data.map((cus) => {
            return {
                name: `${cus.first_name} ${cus.last_name}`,
                id: cus.id,
            };
        });
    });
}
</script>

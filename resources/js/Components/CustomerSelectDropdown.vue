<template>
    <v-autocomplete
        label="Select Customer"
        placeholder="Search a customer"
        density="compact"
        :items="results"
        item-title="name"
        item-value="id"
        return-object
        @update:search="debouncedFn"
        v-model="selectedItem"
        @update:menu="emits('changed')"
    />
</template>
<script setup>
import { ref } from "vue";
import { useDebounceFn, useVModel } from "@vueuse/core";

const props = defineProps({
    modelValue: Object,
});

const emits = defineEmits(["update:modelValue"]);

const results = ref([]);
const searchValue = ref("");

const selectedItem = useVModel(props, "modelValue", emits);
const debouncedFn = useDebounceFn((searchTerm) => {
    if (
        searchTerm &&
        searchTerm != (selectedItem.value && selectedItem.value.name)
    ) {
        search(searchTerm);
        searchValue.value = searchTerm;
    } else {
        results.value = [];
    }
}, 500);

function search(searchTerm = "") {
    let searchPath = route("customers.search");
    if (searchTerm) {
        searchPath = `${searchPath}/?search=${searchTerm}`;
    }
    axios.get(searchPath).then(({ data }) => {
        results.value = data.customers.data.map((cus) => {
            return {
                name: `${cus.first_name} ${cus.last_name}`,
                ...cus,
            };
        });
    });
}
</script>

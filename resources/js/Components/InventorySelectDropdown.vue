<template>
    <v-autocomplete
        label="Search Inventory"
        placeholder="Search for an inventory item"
        density="compact"
        :items="results"
        item-title="name"
        item-value="id"
        return-object
        @update:search="debouncedFn"
        v-model="selectedItem"
        no-filter
    />
</template>
<script setup>
import { ref, watch } from "vue";
import { useDebounceFn, useVModel } from "@vueuse/core";

const props = defineProps({
    modelValue: Object,
});

const emits = defineEmits(["update:modelValue", "changed"]);

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
    let searchPath = route("inventory.search");
    if (searchTerm) {
        searchPath = `${searchPath}/?search=${searchTerm}`;
    }
    axios.get(searchPath).then(({ data }) => {
        results.value = data.inventory.data;
    });
}

// watch(selectedItem, (newValue) => {
//     if (newValue) {
//         emits("changed");
//     }
// });
</script>

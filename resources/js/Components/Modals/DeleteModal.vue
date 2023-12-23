<template>
    <v-dialog width="500" v-model="openModal">
        <template v-slot:activator="{ props }">
            <v-btn v-bind="props" text="Open Dialog"> </v-btn>
        </template>

        <template v-slot:default="{ isActive }">
            <v-card :title="title">
                <v-card-text>
                    Are you sure you want to delete this item?
                    <slot />

                    <div class="text-warning">
                        Please note that deleted items cannot be retrieved
                    </div>
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn text="Cancel" @click="closeModal" variant="flat"/>

                    <v-btn
                        color="error"
                        variant="outlined"
                        text="Yes delete"
                        @click="approveDeletion"
                    />
                </v-card-actions>
            </v-card>
        </template>
    </v-dialog>
</template>

<script setup>
import { watch, ref } from "vue";

const props = defineProps({
    modelValue: Boolean,
    title: {
        type: String,
        default: "Delete",
    },
});

const emits = defineEmits(["update:modelValue","close","approveDelete"]);

const openModal = ref(false);

watch(
    () => props.modelValue,
    (newVal) => {
        openModal.value = newVal;
    },
    { immediate: true }
);

watch(openModal, (newVal) => {
    emits("update:modelValue", newVal);
});

function closeModal(){
    openModal.value = false;
    emits("close", true);
}

function approveDeletion(){
    emits("approveDelete", true);
    closeModal();
}
</script>

<template>
    <div>
        <v-menu>
            <template v-slot:activator="{ props }">
                <v-btn
                    variant="plain"
                    icon="mdi-dots-horizontal"
                    v-bind="props"
                    size="small"
                    :loading="isLoading"
                    :disabled="isLoading"
                />
            </template>

            <v-list>
                <v-list-item
                    v-for="(actionItem, i) in actionItems"
                    :key="i"
                    @click="menuItemClick(actionItem)"
                >
                    <v-list-item-title>
                        {{ actionItem.title }}
                    </v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </div>
</template>

<script setup>
defineProps({
    actionItems: {
        type: Array,
        required: true,
    },
    isLoading:Boolean,

});

const emit = defineEmits(["menuItemClicked"]);

function menuItemClick(actionItem) {
    emit("menuItemClicked", actionItem);
}
</script>

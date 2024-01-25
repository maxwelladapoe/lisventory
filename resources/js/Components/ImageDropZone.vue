<template>
    <div>
        <input
            type="file"
            class="d-none"
            ref="fileSelectRef"
            multiple
            @change="fileSelected"
            :accept="allowedFileTypes.toString()"
        />
        <v-sheet border="md dashed" rounded="lg" border-color="red
        "
        
            style="height: 100px"
            ref="dropZoneRef"
            @click="fileSelectRef.click()"
        >
            <div
                class="d-flex align-center justify-center flex-column h-100"
                v-if="selectedFilesForUpload.length == 0"
            >
                <div class="d-flex justify-center align-center">
                    <component :is="icon" v-if="icon" />
                    <span class="block text-grey ml-2 text-xs">{{
                        placeholder
                    }}</span>
                </div>

                <p class="text-xs text-error text-center">
                    only {{ allowedFileTypes.toString() }} are allowed
                    <span v-if="props.maxNumFiles">
                        & a maximum of {{ props.maxNumFiles }} file(s)</span
                    >
                </p>
            </div>

            <div v-else>
                <div class="d-flex gap-2 flex-wrap pa-2">
                    <div
                        class="bg-primary rounded-xl d-flex flex-wrap px-4 py-2 align-center justify-space-between"
                        v-for="(file, index) in selectedFilesForUpload"
                        :key="index + file.name"
                    >
                        <div
                            class="text-body-2 text-truncate"
                            style="max-width: 150px"
                        >
                            {{ file.name }}
                        </div>
                        <v-btn
                            @click.stop.prevent="removeFile(index)"
                            icon="mdi-close"
                            size="x-small"
                            color="error"
                            class="mr-n6 mt-n4"
                            rounded="xl"
                        />
                    </div>
                </div>
            </div>
        </v-sheet>
    </div>
</template>
<script setup>
import { useDropZone } from "@vueuse/core";
import { ref, watch } from "vue";

const props = defineProps({
    type: {
        type: String,
        default: "text",
    },

    label: {
        type: String,
        required: false,
    },
    placeholder: {
        type: String,
        default: "Drag files or click to add file",
    },
    icon: {
        type: String,
        default: "CloudUploadIcon",
    },
    required: {
        type: Boolean,
        default: false,
    },
    allowedFileTypes: {
        type: Array,
        default: () => ["image/png", "image/jpg", "image/jpeg"],
    },
    modelValue: {
        type: null,
    },
    value: {
        type: null,
    },
    maxNumFiles: {
        type: [String, Number],
        required: false,
    },
});

const dropZoneRef = ref();
const fileSelectRef = ref();
const selectedFilesForUpload = ref([]);
const errorsFilesForUpload = ref([]);

const emits = defineEmits(["update:modelValue", "errors", "change"]);

const onDrop = (files) => {
    let passes;
    for (var i = 0; i < files.length; i++) {
        if (props.allowedFileTypes.includes(files[i].type)) {
            passes = true;

            const fileSize = files[i].size / 1024 / 1024; // conversion to mb

            if (fileSize <= 2) {
                passes = true;
            } else {
                passes = false;
                errorsFilesForUpload.value.push(
                    `${files[i].name} is too large`
                );
            }

            if (passes) {
                if (
                    props.maxNumFiles &&
                    selectedFilesForUpload.value.length == props.maxNumFiles
                ) {
                    errorsFilesForUpload.value.push(
                        `You cant add any more files`
                    );
                    return;
                } else {
                    selectedFilesForUpload.value.push(files[i]);
                }
            }
        } else {
            errorsFilesForUpload.value.push(
                `${files[i].name} is not an allowed file type`
            );
        }
    }
    emits("change", selectedFilesForUpload.value);
    emits("errors", errorsFilesForUpload.value);
};

const fileSelected = (event) => {
    const files = event.target.files;
    onDrop(files);
};

const removeFile = (index) => {
    selectedFilesForUpload.value.splice(index, 1);
    emits("change", selectedFilesForUpload.value);
};
watch(
    () => props.modelValue,
    (newValue) => {
        selectedFilesForUpload.value = newValue;
    }
);

useDropZone(dropZoneRef, { onDrop, dataTypes: props.allowedFileTypes });
</script>

<!-- <script setup>
import { useDropZone } from '@vueuse/core'

const dropZoneRef = ref()

function onDrop(files) {
  // called when files are dropped on zone
}

const { isOverDropZone } = useDropZone(dropZoneRef, {
  onDrop,
  // specify the types of data to be received.
  dataTypes: ['image/jpeg','image/png','image/jpg']
})
</script> -->

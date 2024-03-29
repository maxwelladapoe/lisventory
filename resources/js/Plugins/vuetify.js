import "@mdi/font/css/materialdesignicons.css";
import "vuetify/styles";
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as labsComponents from "vuetify/labs/components";
import * as directives from "vuetify/directives";
import { aliases, mdi } from "vuetify/iconsets/mdi";

const DefaultTheme = {
    name: "DefaultTheme",
    dark: false,
    variables: {
        "border-color": "#5a6a85",
        "carousel-control-size": 10,
    },
    colors: {
        primary: "#3C5CAA",
        //   primary: '#5D87FF',
        secondary: '#49BEFF',
        info: '#539BFF',
        success: "#13DEB9",
        accent: "#FFAB91",
        warning: "#FFAE1F",
        error: "#FA896B",
        muted: "#5a6a85",
        lightprimary: "#ECF2FF",
        lightsecondary: "#E8F7FF",
        lightsuccess: "#E6FFFA",
        lighterror: "#FDEDE8",
        lightwarning: "#FEF5E5",
        textPrimary: "#2A3547",
        textSecondary: "#2A3547",
        borderColor: "#e5eaef",
        inputBorder: "#000",
        containerBg: "#ffffff",
        hoverColor: "#f6f9fc",
        surface: "#fff",
        "on-surface-variant": "#fff",
        grey100: "#F2F6FA",
        grey200: "#EAEFF4",
    },
};

const vuetify = createVuetify({
    components: {
        ...components,
        ...labsComponents,
    },
    theme: {
        defaultTheme: "DefaultTheme",
        themes: {
            DefaultTheme,
        },
    },
    directives,
    icons: {
        defaultSet: "mdi",
        aliases,
        sets: {
            mdi,
        },
    },
    defaults: {
        VBtn: {
            elevation: "0",
            rounded: "lg",
            color: "primary",
        },
        VCard: {
            rounded: "lg",
            elevation: "10",
            class: "withbg",
        },
        VTextField: {
            rounded: "lg",
            variant: "outlined",
            density: "comfortable",
            hideDetails: "auto",
        },
        VTextarea: {
            rounded: "lg",
            variant: "outlined",
            density: "comfortable",
            hideDetails: "auto",
        },
        VDatePicker: {
            rounded: "lg",
            variant: "outlined",
            density: "comfortable",
            hideDetails: "auto",
        },
        VAutocomplete: {
            rounded: "lg",
            variant: "outlined",
            density: "comfortable",
            hideDetails: "auto",
        },
        VCombobox: {
            rounded: "lg",
            variant: "outlined",
            density: "comfortable",
            hideDetails: "auto",
        },
        VSelect: {
            rounded: "lg",
            variant: "outlined",
            density: "comfortable",
            hideDetails: "auto",
        },
        VFileInput: {
            rounded: "lg",
            variant: "outlined",
            density: "comfortable",
            hideDetails: "auto",
        },
        VTooltip: {
            // set v-tooltip default location to top
            location: "top",
        },
        VSwitch: {
            hideDetails: "auto",
        },
        VLabel: {
            class: "font-weight-bold mb-1",
        },
    },
});

export default vuetify;

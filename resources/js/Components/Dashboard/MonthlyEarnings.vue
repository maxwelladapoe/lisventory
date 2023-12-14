<template>
    <v-card>
        <v-card-item>
            <div class="d-flex align-center justify-space-between pt-sm-2">
                <v-card-title class="text-h5">Monthly Earnings</v-card-title>
                <v-btn size="large" icon class="bg-secondary" rounded="xl">
                    <v-avatar size="large" class="text-white">
                        <v-icon icon="mdi mdi-currency-usd" size="25" color="white" />
                    </v-avatar>
                </v-btn>
            </div>
            <v-row>
                <v-col cols="12">
                    <div class="mt-2">
                        <h3 class="text-h3">$6,820</h3>
                        <div class="mt-1">
                            <v-avatar
                                class="bg-lighterror text-accent"
                                size="25"
                            >
                                <v-icon
                                    icon="mdi mdi-arrow-bottom-right"
                                    size="20"
                                />
                            </v-avatar>
                            <span class="text-subtitle-1 ml-2 font-weight-bold"
                                >+9%</span
                            >
                            <span class="text-subtitle-1 text-muted ml-2"
                                >last year</span
                            >
                        </div>
                    </div>
                </v-col>
            </v-row>
        </v-card-item>
        <div class="mt-3">
            <apexchart
                type="area"
                height="60"
                :options="areachartOptions"
                :series="areaChart.series"
            >
            </apexchart>
        </div>
    </v-card>
</template>

<script setup>
import { ref } from "vue";
import { computed } from "vue";
import { useTheme } from "vuetify";
const theme = useTheme();
const primary = theme.current.value.colors.primary;
const secondary = theme.current.value.colors.secondary;

/* Chart */
const areachartOptions = computed(() => {
    return {
        labels: ["1", "2", "3", "4", "5", "6", "7"],
        chart: {
            type: "area",
            height: 60,
            fontFamily: `inherit`,
            foreColor: "#a1aab2",
            toolbar: {
                show: false,
            },
            sparkline: {
                enabled: true,
            },
            group: "sparklines",
        },
        colors: [secondary],
        stroke: {
            curve: "smooth",
            width: 2,
        },
        fill: {
            type: "solid",
            opacity: 0.05,
        },
        markers: {
            size: 0,
        },
        tooltip: {
            theme: "light",
            x: {
                show: true,
            },
        },
    };
});

const areaChart = {
    series: [
        {
            name: "",
            data: [25, 66, 20, 40, 12, 58, 20],
        },
    ],
};
</script>

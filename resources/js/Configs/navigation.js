export default {
    items: [
        {
            title: "Dashboard",
            icon: "mdi-view-dashboard-outline",
            to: "/dashboard",
        },
        {
            title: "Inventory",
            icon: "mdi-package-variant",
            to: "/inventory",
        },
        {
            title: "Orders",
            icon: "mdi-cart-variant",
            to: "/orders",
            altLink:"/pos"
        },
        {
            title: "Customers",
            icon: "mdi-account-multiple-outline",
            to: "/customers",
        },
        {
            title: "Suppliers",
            icon: "mdi-briefcase-variant-outline",
            to: "/suppliers",
        },
        {
            title: "Invoices",
            icon: "mdi-receipt-text-outline",
            to: "/invoices",
        },
        {
            title: "Reports",
            icon: "mdi-chart-box-outline",
            to: "/reports",
        },
    ],
};

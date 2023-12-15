<template>
    <v-row>
        <v-col cols="12" md="9">
            <div
                class="v-card v-theme--light v-card--density-default v-card--variant-elevated"
            >
                <!---->
                <div class="v-card__loader">
                    <div
                        class="v-progress-linear v-theme--light"
                        role="progressbar"
                        aria-hidden="true"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        style="
                            top: 0px;
                            height: 0px;
                            --v-progress-linear-height: 2px;
                            left: 50%;
                            transform: translateX(-50%);
                        "
                    >
                        <!---->
                        <div
                            class="v-progress-linear__background"
                            style="width: 100%"
                        ></div>
                        <div class="v-progress-linear__indeterminate">
                            <div
                                class="v-progress-linear__indeterminate long"
                            ></div>
                            <div
                                class="v-progress-linear__indeterminate short"
                            ></div>
                        </div>
                        <!---->
                    </div>
                </div>
                <!----><!---->
                <div
                    class="v-card-text d-flex flex-wrap justify-space-between gap-y-5 flex-column flex-sm-row"
                >
                    <div class="mb-6">
                        <div class="d-flex align-center mb-6">
                            <div
                                class="me-3"
                                style="
                                    line-height: 0;
                                    color: rgb(var(--v-global-theme-primary));
                                "
                            >
                                <svg
                                    width="1.875em"
                                    height="1.5em"
                                    viewBox="0 0 250 196"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M12.3002 1.25469L56.655 28.6432C59.0349 30.1128 60.4839 32.711 60.4839 35.5089V160.63C60.4839 163.468 58.9941 166.097 56.5603 167.553L12.2055 194.107C8.3836 196.395 3.43136 195.15 1.14435 191.327C0.395485 190.075 0 188.643 0 187.184V8.12039C0 3.66447 3.61061 0.0522461 8.06452 0.0522461C9.56056 0.0522461 11.0271 0.468577 12.3002 1.25469Z"
                                        fill="currentColor"
                                    ></path>
                                    <path
                                        opacity="0.077704"
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M0 65.2656L60.4839 99.9629V133.979L0 65.2656Z"
                                        fill="black"
                                    ></path>
                                    <path
                                        opacity="0.077704"
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M0 65.2656L60.4839 99.0795V119.859L0 65.2656Z"
                                        fill="black"
                                    ></path>
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M237.71 1.22393L193.355 28.5207C190.97 29.9889 189.516 32.5905 189.516 35.3927V160.631C189.516 163.469 191.006 166.098 193.44 167.555L237.794 194.108C241.616 196.396 246.569 195.151 248.856 191.328C249.605 190.076 250 188.644 250 187.185V8.09597C250 3.64006 246.389 0.027832 241.935 0.027832C240.444 0.027832 238.981 0.441882 237.71 1.22393Z"
                                        fill="currentColor"
                                    ></path>
                                    <path
                                        opacity="0.077704"
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M250 65.2656L189.516 99.8897V135.006L250 65.2656Z"
                                        fill="black"
                                    ></path>
                                    <path
                                        opacity="0.077704"
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M250 65.2656L189.516 99.0497V120.886L250 65.2656Z"
                                        fill="black"
                                    ></path>
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z"
                                        fill="currentColor"
                                    ></path>
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z"
                                        fill="white"
                                        fill-opacity="0.15"
                                    ></path>
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z"
                                        fill="currentColor"
                                    ></path>
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z"
                                        fill="white"
                                        fill-opacity="0.3"
                                    ></path>
                                </svg>
                            </div>
                            <h6 class="text-xl text-uppercase">materio</h6>
                        </div>
                        <p class="mb-0">Office 149, 450 South Brand Brooklyn</p>
                        <p class="mb-0">San Diego County, CA 91905, USA</p>
                        <p class="mb-0">
                            +1 (123) 456 7891, +44 (876) 543 2198
                        </p>
                    </div>
                    <div class="mb-3">
                        <h6
                            class="d-flex align-center text-h6 justify-sm-end mb-4"
                        >
                            <span class="me-3" style="inline-size: 6rem"
                                >Invoice:</span
                            ><span
                                ><div
                                    class="v-input v-input--horizontal v-input--density-compact v-input--dirty v-input--disabled v-text-field v-text-field--prefixed"
                                    style="inline-size: 9.5rem"
                                >
                                    <!---->
                                    <div class="v-input__control">
                                        <div
                                            class="v-field v-field--active v-field--disabled v-field--dirty v-field--no-label v-field--variant-outlined v-theme--light"
                                            role="textbox"
                                        >
                                            <div class="v-field__overlay"></div>
                                            <div class="v-field__loader">
                                                <div
                                                    class="v-progress-linear v-theme--light"
                                                    role="progressbar"
                                                    aria-hidden="true"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                                    style="
                                                        top: 0px;
                                                        height: 0px;
                                                        --v-progress-linear-height: 2px;
                                                        left: 50%;
                                                        transform: translateX(
                                                            -50%
                                                        );
                                                    "
                                                >
                                                    <!---->
                                                    <div
                                                        class="v-progress-linear__background bg-primary"
                                                        style="width: 100%"
                                                    ></div>
                                                    <div
                                                        class="v-progress-linear__indeterminate"
                                                    >
                                                        <div
                                                            class="v-progress-linear__indeterminate long bg-primary"
                                                        ></div>
                                                        <div
                                                            class="v-progress-linear__indeterminate short bg-primary"
                                                        ></div>
                                                    </div>
                                                    <!---->
                                                </div>
                                            </div>
                                            <!---->
                                            <div
                                                class="v-field__field"
                                                data-no-activator=""
                                            >
                                                <!----><label
                                                    class="v-label v-field-label"
                                                    for="input-326"
                                                    ><!----><!----></label
                                                ><span
                                                    class="v-text-field__prefix"
                                                    >#</span
                                                ><input
                                                    disabled=""
                                                    size="1"
                                                    type="text"
                                                    id="input-326"
                                                    aria-describedby="input-326-messages"
                                                    class="v-field__input"
                                                /><!---->
                                            </div>
                                            <!----><!---->
                                            <div class="v-field__outline">
                                                <div
                                                    class="v-field__outline__start"
                                                ></div>
                                                <!---->
                                                <div
                                                    class="v-field__outline__end"
                                                ></div>
                                                <!---->
                                            </div>
                                        </div>
                                    </div>
                                    <!----><!---->
                                </div></span
                            >
                        </h6>
                        <p class="d-flex align-center justify-sm-end mb-4">
                            <span class="me-3" style="inline-size: 6rem"
                                >Date Issued:</span
                            ><span style="inline-size: 9.5rem"
                                ><div class="app-picker-field">
                                    <div
                                        class="v-input v-input--horizontal v-input--density-compact position-relative v-text-field"
                                    >
                                        <!---->
                                        <div class="v-input__control">
                                            <div
                                                class="v-field v-field--no-label v-field--variant-outlined v-theme--light"
                                                role="textbox"
                                            >
                                                <div
                                                    class="v-field__overlay"
                                                ></div>
                                                <div class="v-field__loader">
                                                    <div
                                                        class="v-progress-linear v-theme--light"
                                                        role="progressbar"
                                                        aria-hidden="true"
                                                        aria-valuemin="0"
                                                        aria-valuemax="100"
                                                        style="
                                                            top: 0px;
                                                            height: 0px;
                                                            --v-progress-linear-height: 2px;
                                                            left: 50%;
                                                            transform: translateX(
                                                                -50%
                                                            );
                                                        "
                                                    >
                                                        <!---->
                                                        <div
                                                            class="v-progress-linear__background bg-primary"
                                                            style="width: 100%"
                                                        ></div>
                                                        <div
                                                            class="v-progress-linear__indeterminate"
                                                        >
                                                            <div
                                                                class="v-progress-linear__indeterminate long bg-primary"
                                                            ></div>
                                                            <div
                                                                class="v-progress-linear__indeterminate short bg-primary"
                                                            ></div>
                                                        </div>
                                                        <!---->
                                                    </div>
                                                </div>
                                                <!---->
                                                <div
                                                    class="v-field__field"
                                                    data-no-activator=""
                                                >
                                                    <!----><label
                                                        class="v-label v-field-label"
                                                        for="input-328"
                                                        ><!----><!----></label
                                                    >
                                                    <div
                                                        id="input-328"
                                                        class="v-field__input"
                                                        aria-describedby="input-328-messages"
                                                    >
                                                        <input
                                                            type="text"
                                                            data-input="true"
                                                            placeholder="YYYY-MM-DD"
                                                            class="flat-picker-custom-style flatpickr-input"
                                                            readonly="readonly"
                                                        /><!---->
                                                    </div>
                                                </div>
                                                <!----><!---->
                                                <div class="v-field__outline">
                                                    <div
                                                        class="v-field__outline__start"
                                                    ></div>
                                                    <!---->
                                                    <div
                                                        class="v-field__outline__end"
                                                    ></div>
                                                    <!---->
                                                </div>
                                            </div>
                                        </div>
                                        <!----><!---->
                                    </div>
                                    <!---->
                                </div></span
                            >
                        </p>
                        <p class="d-flex align-center justify-sm-end mb-0">
                            <span class="me-3" style="inline-size: 6rem"
                                >Due Date:</span
                            ><span style="min-inline-size: 9.5rem"
                                ><div class="app-picker-field">
                                    <div
                                        class="v-input v-input--horizontal v-input--density-compact position-relative v-text-field"
                                    >
                                        <!---->
                                        <div class="v-input__control">
                                            <div
                                                class="v-field v-field--no-label v-field--variant-outlined v-theme--light"
                                                role="textbox"
                                            >
                                                <div
                                                    class="v-field__overlay"
                                                ></div>
                                                <div class="v-field__loader">
                                                    <div
                                                        class="v-progress-linear v-theme--light"
                                                        role="progressbar"
                                                        aria-hidden="true"
                                                        aria-valuemin="0"
                                                        aria-valuemax="100"
                                                        style="
                                                            top: 0px;
                                                            height: 0px;
                                                            --v-progress-linear-height: 2px;
                                                            left: 50%;
                                                            transform: translateX(
                                                                -50%
                                                            );
                                                        "
                                                    >
                                                        <!---->
                                                        <div
                                                            class="v-progress-linear__background bg-primary"
                                                            style="width: 100%"
                                                        ></div>
                                                        <div
                                                            class="v-progress-linear__indeterminate"
                                                        >
                                                            <div
                                                                class="v-progress-linear__indeterminate long bg-primary"
                                                            ></div>
                                                            <div
                                                                class="v-progress-linear__indeterminate short bg-primary"
                                                            ></div>
                                                        </div>
                                                        <!---->
                                                    </div>
                                                </div>
                                                <!---->
                                                <div
                                                    class="v-field__field"
                                                    data-no-activator=""
                                                >
                                                    <!----><label
                                                        class="v-label v-field-label"
                                                        for="input-330"
                                                        ><!----><!----></label
                                                    >
                                                    <div
                                                        id="input-330"
                                                        class="v-field__input"
                                                        aria-describedby="input-330-messages"
                                                    >
                                                        <input
                                                            type="text"
                                                            data-input="true"
                                                            placeholder="YYYY-MM-DD"
                                                            class="flat-picker-custom-style flatpickr-input"
                                                            readonly="readonly"
                                                        /><!---->
                                                    </div>
                                                </div>
                                                <!----><!---->
                                                <div class="v-field__outline">
                                                    <div
                                                        class="v-field__outline__start"
                                                    ></div>
                                                    <!---->
                                                    <div
                                                        class="v-field__outline__end"
                                                    ></div>
                                                    <!---->
                                                </div>
                                            </div>
                                        </div>
                                        <!----><!---->
                                    </div>
                                    <!---->
                                </div></span
                            >
                        </p>
                    </div>
                </div>
                <hr
                    class="v-divider v-theme--light mb-2"
                    aria-orientation="horizontal"
                    role="separator"
                />
                <div
                    class="v-card-text d-flex flex-wrap justify-space-between flex-column flex-sm-row gap-y-5"
                >
                    <div class="mb-4 mb-sm-0" style="inline-size: 15.5rem">
                        <h6 class="text-sm font-weight-medium mb-3">
                            Invoice To:
                        </h6>
                        <div
                            class="v-input v-input--horizontal v-input--density-compact v-input--dirty v-input--readonly v-text-field v-select v-select--single v-select--selected mb-5"
                        >
                            <!---->
                            <div class="v-input__control">
                                <div
                                    class="v-field v-field--active v-field--appended v-field--dirty v-field--no-label v-field--variant-outlined v-theme--light"
                                    role="textbox"
                                    aria-haspopup="menu"
                                    aria-expanded="false"
                                    aria-owns="v-menu-334"
                                >
                                    <div class="v-field__overlay"></div>
                                    <div class="v-field__loader">
                                        <div
                                            class="v-progress-linear v-theme--light"
                                            role="progressbar"
                                            aria-hidden="true"
                                            aria-valuemin="0"
                                            aria-valuemax="100"
                                            style="
                                                top: 0px;
                                                height: 0px;
                                                --v-progress-linear-height: 2px;
                                                left: 50%;
                                                transform: translateX(-50%);
                                            "
                                        >
                                            <!---->
                                            <div
                                                class="v-progress-linear__background bg-primary"
                                                style="width: 100%"
                                            ></div>
                                            <div
                                                class="v-progress-linear__indeterminate"
                                            >
                                                <div
                                                    class="v-progress-linear__indeterminate long bg-primary"
                                                ></div>
                                                <div
                                                    class="v-progress-linear__indeterminate short bg-primary"
                                                ></div>
                                            </div>
                                            <!---->
                                        </div>
                                    </div>
                                    <!---->
                                    <div
                                        class="v-field__field"
                                        data-no-activator=""
                                    >
                                        <!----><label
                                            class="v-label v-field-label"
                                            for="input-332"
                                            ><!----><!----></label
                                        ><!---->
                                        <div
                                            class="v-field__input"
                                            data-no-activator=""
                                        >
                                            <!---->
                                            <div class="v-select__selection">
                                                <span
                                                    class="v-select__selection-text"
                                                    ><!----></span
                                                >
                                            </div>
                                            <input
                                                readonly=""
                                                size="1"
                                                type="text"
                                                id="input-332"
                                                aria-describedby="input-332-messages"
                                            />
                                        </div>
                                        <!---->
                                    </div>
                                    <!---->
                                    <div class="v-field__append-inner">
                                        <!----><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            aria-hidden="true"
                                            role="img"
                                            tag="i"
                                            class="v-icon notranslate v-theme--light v-icon--size-default iconify iconify--mdi"
                                            width="1em"
                                            height="1em"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                fill="currentColor"
                                                d="m7 10l5 5l5-5H7Z"
                                            ></path>
                                        </svg>
                                    </div>
                                    <div class="v-field__outline">
                                        <div
                                            class="v-field__outline__start"
                                        ></div>
                                        <!---->
                                        <div
                                            class="v-field__outline__end"
                                        ></div>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            <!----><!---->
                        </div>
                        <p class="mb-1"></p>
                        <p class="mb-1"></p>
                        <!---->
                        <p class="mb-1"></p>
                        <p class="mb-1"></p>
                    </div>
                    <div>
                        <h6 class="text-sm font-weight-medium mb-3">
                            Bill To:
                        </h6>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="pe-6">Total Due:</td>
                                    <td>$12,110.55</td>
                                </tr>
                                <tr>
                                    <td class="pe-6">Bank Name:</td>
                                    <td>American Bank</td>
                                </tr>
                                <tr>
                                    <td class="pe-6">Country:</td>
                                    <td>United States</td>
                                </tr>
                                <tr>
                                    <td class="pe-6">IBAN:</td>
                                    <td>ETD95476213874685</td>
                                </tr>
                                <tr>
                                    <td class="pe-6">SWIFT Code:</td>
                                    <td>BR91905</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr
                    class="v-divider v-theme--light"
                    aria-orientation="horizontal"
                    role="separator"
                />
                <div class="v-card-text add-products-form">
                    <div class="mb-4">
                        <div
                            class="add-products-header mb-2 d-none d-md-flex ps-5 pe-16"
                        >
                            <div class="v-row font-weight-medium">
                                <div class="v-col-md-6 v-col-12">
                                    <h6 class="text-sm font-weight-medium">
                                        Item
                                    </h6>
                                </div>
                                <div class="v-col-md-2 v-col-12">
                                    <h6 class="text-sm font-weight-medium">
                                        Cost
                                    </h6>
                                </div>
                                <div class="v-col-md-2 v-col-12">
                                    <h6 class="text-sm font-weight-medium">
                                        Hours
                                    </h6>
                                </div>
                                <div class="v-col-md-2 v-col-12">
                                    <h6 class="text-sm font-weight-medium">
                                        Price
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div
                            class="v-card v-card--flat v-theme--light v-card--border v-card--density-default v-card--variant-elevated d-flex flex-sm-row flex-column-reverse"
                        >
                            <!---->
                            <div class="v-card__loader">
                                <div
                                    class="v-progress-linear v-theme--light"
                                    role="progressbar"
                                    aria-hidden="true"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                    style="
                                        top: 0px;
                                        height: 0px;
                                        --v-progress-linear-height: 2px;
                                        left: 50%;
                                        transform: translateX(-50%);
                                    "
                                >
                                    <!---->
                                    <div
                                        class="v-progress-linear__background"
                                        style="width: 100%"
                                    ></div>
                                    <div
                                        class="v-progress-linear__indeterminate"
                                    >
                                        <div
                                            class="v-progress-linear__indeterminate long"
                                        ></div>
                                        <div
                                            class="v-progress-linear__indeterminate short"
                                        ></div>
                                    </div>
                                    <!---->
                                </div>
                            </div>
                            <!----><!---->
                            <div class="pa-5 flex-grow-1">
                                <div class="v-row">
                                    <div class="v-col-md-6 v-col-12">
                                        <div
                                            class="v-input v-input--horizontal v-input--density-compact v-input--dirty v-input--readonly v-text-field v-select v-select--single v-select--selected mb-5"
                                        >
                                            <!---->
                                            <div class="v-input__control">
                                                <div
                                                    class="v-field v-field--active v-field--appended v-field--dirty v-field--variant-outlined v-theme--light"
                                                    role="textbox"
                                                    aria-haspopup="menu"
                                                    aria-expanded="false"
                                                    aria-owns="v-menu-337"
                                                >
                                                    <div
                                                        class="v-field__overlay"
                                                    ></div>
                                                    <div
                                                        class="v-field__loader"
                                                    >
                                                        <div
                                                            class="v-progress-linear v-theme--light"
                                                            role="progressbar"
                                                            aria-hidden="true"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"
                                                            style="
                                                                top: 0px;
                                                                height: 0px;
                                                                --v-progress-linear-height: 2px;
                                                                left: 50%;
                                                                transform: translateX(
                                                                    -50%
                                                                );
                                                            "
                                                        >
                                                            <!---->
                                                            <div
                                                                class="v-progress-linear__background bg-primary"
                                                                style="
                                                                    width: 100%;
                                                                "
                                                            ></div>
                                                            <div
                                                                class="v-progress-linear__indeterminate"
                                                            >
                                                                <div
                                                                    class="v-progress-linear__indeterminate long bg-primary"
                                                                ></div>
                                                                <div
                                                                    class="v-progress-linear__indeterminate short bg-primary"
                                                                ></div>
                                                            </div>
                                                            <!---->
                                                        </div>
                                                    </div>
                                                    <!---->
                                                    <div
                                                        class="v-field__field"
                                                        data-no-activator=""
                                                    >
                                                        <!----><label
                                                            class="v-label v-field-label"
                                                            for="input-335"
                                                            ><!---->Select
                                                            Item</label
                                                        ><!---->
                                                        <div
                                                            class="v-field__input"
                                                            data-no-activator=""
                                                        >
                                                            <!---->
                                                            <div
                                                                class="v-select__selection"
                                                            >
                                                                <span
                                                                    class="v-select__selection-text"
                                                                    >App
                                                                    Customization<!----></span
                                                                >
                                                            </div>
                                                            <input
                                                                readonly=""
                                                                size="1"
                                                                type="text"
                                                                id="input-335"
                                                                aria-describedby="input-335-messages"
                                                            />
                                                        </div>
                                                        <!---->
                                                    </div>
                                                    <!---->
                                                    <div
                                                        class="v-field__append-inner"
                                                    >
                                                        <!----><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            aria-hidden="true"
                                                            role="img"
                                                            tag="i"
                                                            class="v-icon notranslate v-theme--light v-icon--size-default iconify iconify--mdi"
                                                            width="1em"
                                                            height="1em"
                                                            viewBox="0 0 24 24"
                                                        >
                                                            <path
                                                                fill="currentColor"
                                                                d="m7 10l5 5l5-5H7Z"
                                                            ></path>
                                                        </svg>
                                                    </div>
                                                    <div
                                                        class="v-field__outline"
                                                    >
                                                        <div
                                                            class="v-field__outline__start"
                                                        ></div>
                                                        <div
                                                            class="v-field__outline__notch"
                                                        >
                                                            <label
                                                                class="v-label v-field-label v-field-label--floating"
                                                                aria-hidden="true"
                                                                for="input-335"
                                                                ><!---->Select
                                                                Item</label
                                                            >
                                                        </div>
                                                        <div
                                                            class="v-field__outline__end"
                                                        ></div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </div>
                                            <!----><!---->
                                        </div>
                                        <div
                                            class="v-input v-input--horizontal v-input--density-compact v-textarea v-text-field"
                                        >
                                            <!---->
                                            <div class="v-input__control">
                                                <div
                                                    class="v-field v-field--variant-outlined v-theme--light"
                                                    role="textbox"
                                                >
                                                    <div
                                                        class="v-field__overlay"
                                                    ></div>
                                                    <div
                                                        class="v-field__loader"
                                                    >
                                                        <div
                                                            class="v-progress-linear v-theme--light"
                                                            role="progressbar"
                                                            aria-hidden="true"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"
                                                            style="
                                                                top: 0px;
                                                                height: 0px;
                                                                --v-progress-linear-height: 2px;
                                                                left: 50%;
                                                                transform: translateX(
                                                                    -50%
                                                                );
                                                            "
                                                        >
                                                            <!---->
                                                            <div
                                                                class="v-progress-linear__background bg-primary"
                                                                style="
                                                                    width: 100%;
                                                                "
                                                            ></div>
                                                            <div
                                                                class="v-progress-linear__indeterminate"
                                                            >
                                                                <div
                                                                    class="v-progress-linear__indeterminate long bg-primary"
                                                                ></div>
                                                                <div
                                                                    class="v-progress-linear__indeterminate short bg-primary"
                                                                ></div>
                                                            </div>
                                                            <!---->
                                                        </div>
                                                    </div>
                                                    <!---->
                                                    <div
                                                        class="v-field__field"
                                                        data-no-activator=""
                                                    >
                                                        <!----><label
                                                            class="v-label v-field-label"
                                                            for="input-339"
                                                            ><!---->Description</label
                                                        ><!----><textarea
                                                            class="v-field__input"
                                                            placeholder="Description"
                                                            rows="3"
                                                            id="input-339"
                                                            aria-describedby="input-339-messages"
                                                        ></textarea
                                                        ><!----><!---->
                                                    </div>
                                                    <!----><!---->
                                                    <div
                                                        class="v-field__outline"
                                                    >
                                                        <div
                                                            class="v-field__outline__start"
                                                        ></div>
                                                        <div
                                                            class="v-field__outline__notch"
                                                        >
                                                            <label
                                                                class="v-label v-field-label v-field-label--floating"
                                                                aria-hidden="true"
                                                                for="input-339"
                                                                ><!---->Description</label
                                                            >
                                                        </div>
                                                        <div
                                                            class="v-field__outline__end"
                                                        ></div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </div>
                                            <!----><!---->
                                        </div>
                                    </div>
                                    <div class="v-col-sm-4 v-col-md-2 v-col-12">
                                        <div
                                            class="v-input v-input--horizontal v-input--density-compact v-input--dirty v-text-field"
                                        >
                                            <!---->
                                            <div class="v-input__control">
                                                <div
                                                    class="v-field v-field--active v-field--dirty v-field--variant-outlined v-theme--light"
                                                    role="textbox"
                                                >
                                                    <div
                                                        class="v-field__overlay"
                                                    ></div>
                                                    <div
                                                        class="v-field__loader"
                                                    >
                                                        <div
                                                            class="v-progress-linear v-theme--light"
                                                            role="progressbar"
                                                            aria-hidden="true"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"
                                                            style="
                                                                top: 0px;
                                                                height: 0px;
                                                                --v-progress-linear-height: 2px;
                                                                left: 50%;
                                                                transform: translateX(
                                                                    -50%
                                                                );
                                                            "
                                                        >
                                                            <!---->
                                                            <div
                                                                class="v-progress-linear__background bg-primary"
                                                                style="
                                                                    width: 100%;
                                                                "
                                                            ></div>
                                                            <div
                                                                class="v-progress-linear__indeterminate"
                                                            >
                                                                <div
                                                                    class="v-progress-linear__indeterminate long bg-primary"
                                                                ></div>
                                                                <div
                                                                    class="v-progress-linear__indeterminate short bg-primary"
                                                                ></div>
                                                            </div>
                                                            <!---->
                                                        </div>
                                                    </div>
                                                    <!---->
                                                    <div
                                                        class="v-field__field"
                                                        data-no-activator=""
                                                    >
                                                        <!----><label
                                                            class="v-label v-field-label"
                                                            for="input-340"
                                                            ><!---->Cost</label
                                                        ><!----><input
                                                            size="1"
                                                            type="number"
                                                            id="input-340"
                                                            aria-describedby="input-340-messages"
                                                            class="v-field__input"
                                                        /><!---->
                                                    </div>
                                                    <!----><!---->
                                                    <div
                                                        class="v-field__outline"
                                                    >
                                                        <div
                                                            class="v-field__outline__start"
                                                        ></div>
                                                        <div
                                                            class="v-field__outline__notch"
                                                        >
                                                            <label
                                                                class="v-label v-field-label v-field-label--floating"
                                                                aria-hidden="true"
                                                                for="input-340"
                                                                ><!---->Cost</label
                                                            >
                                                        </div>
                                                        <div
                                                            class="v-field__outline__end"
                                                        ></div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </div>
                                            <!----><!---->
                                        </div>
                                        <div class="text-body-2 mt-5">
                                            <p class="mb-1">Discount</p>
                                            <span>0%</span
                                            ><span
                                                class="mx-2"
                                                aria-describedby="v-tooltip-342"
                                            >
                                                0%
                                                <!----></span
                                            ><span
                                                aria-describedby="v-tooltip-343"
                                            >
                                                0%
                                                <!----></span
                                            >
                                        </div>
                                    </div>
                                    <div class="v-col-sm-4 v-col-md-2 v-col-12">
                                        <div
                                            class="v-input v-input--horizontal v-input--density-compact v-input--dirty v-text-field"
                                        >
                                            <!---->
                                            <div class="v-input__control">
                                                <div
                                                    class="v-field v-field--active v-field--dirty v-field--variant-outlined v-theme--light"
                                                    role="textbox"
                                                >
                                                    <div
                                                        class="v-field__overlay"
                                                    ></div>
                                                    <div
                                                        class="v-field__loader"
                                                    >
                                                        <div
                                                            class="v-progress-linear v-theme--light"
                                                            role="progressbar"
                                                            aria-hidden="true"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"
                                                            style="
                                                                top: 0px;
                                                                height: 0px;
                                                                --v-progress-linear-height: 2px;
                                                                left: 50%;
                                                                transform: translateX(
                                                                    -50%
                                                                );
                                                            "
                                                        >
                                                            <!---->
                                                            <div
                                                                class="v-progress-linear__background bg-primary"
                                                                style="
                                                                    width: 100%;
                                                                "
                                                            ></div>
                                                            <div
                                                                class="v-progress-linear__indeterminate"
                                                            >
                                                                <div
                                                                    class="v-progress-linear__indeterminate long bg-primary"
                                                                ></div>
                                                                <div
                                                                    class="v-progress-linear__indeterminate short bg-primary"
                                                                ></div>
                                                            </div>
                                                            <!---->
                                                        </div>
                                                    </div>
                                                    <!---->
                                                    <div
                                                        class="v-field__field"
                                                        data-no-activator=""
                                                    >
                                                        <!----><label
                                                            class="v-label v-field-label"
                                                            for="input-344"
                                                            ><!---->Hours</label
                                                        ><!----><input
                                                            size="1"
                                                            type="number"
                                                            id="input-344"
                                                            aria-describedby="input-344-messages"
                                                            class="v-field__input"
                                                        /><!---->
                                                    </div>
                                                    <!----><!---->
                                                    <div
                                                        class="v-field__outline"
                                                    >
                                                        <div
                                                            class="v-field__outline__start"
                                                        ></div>
                                                        <div
                                                            class="v-field__outline__notch"
                                                        >
                                                            <label
                                                                class="v-label v-field-label v-field-label--floating"
                                                                aria-hidden="true"
                                                                for="input-344"
                                                                ><!---->Hours</label
                                                            >
                                                        </div>
                                                        <div
                                                            class="v-field__outline__end"
                                                        ></div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </div>
                                            <!----><!---->
                                        </div>
                                    </div>
                                    <div class="v-col-sm-4 v-col-md-2 v-col-12">
                                        <p class="my-2">
                                            <span class="d-inline d-md-none"
                                                >Price: </span
                                            ><span class="text-body-1">$0</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="d-flex flex-column item-actions pa-1 border-s"
                            >
                                <button
                                    type="button"
                                    class="v-btn v-btn--icon v-theme--light text-default v-btn--density-default v-btn--size-default v-btn--variant-text"
                                >
                                    <span class="v-btn__overlay"></span
                                    ><span class="v-btn__underlay"></span
                                    ><!----><span
                                        class="v-btn__content"
                                        data-no-activator=""
                                        ><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            aria-hidden="true"
                                            role="img"
                                            tag="i"
                                            class="v-icon notranslate v-theme--light iconify iconify--mdi"
                                            width="1em"
                                            height="1em"
                                            viewBox="0 0 24 24"
                                            style="
                                                font-size: 20px;
                                                height: 20px;
                                                width: 20px;
                                            "
                                        >
                                            <path
                                                fill="currentColor"
                                                d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z"
                                            ></path></svg></span
                                    ><!----><!---->
                                </button>
                            </div>
                            <!----><!----><span class="v-card__underlay"></span>
                        </div>
                    </div>
                    <button
                        type="button"
                        class="v-btn v-btn--elevated v-theme--light bg-primary v-btn--density-default v-btn--size-small v-btn--variant-elevated"
                    >
                        <span class="v-btn__overlay"></span
                        ><span class="v-btn__underlay"></span
                        ><span class="v-btn__prepend"
                            ><svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true"
                                role="img"
                                tag="i"
                                class="v-icon notranslate v-theme--light v-icon--size-default iconify iconify--mdi"
                                width="1em"
                                height="1em"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    fill="currentColor"
                                    d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2Z"
                                ></path></svg></span
                        ><span class="v-btn__content" data-no-activator="">
                            Add Item </span
                        ><!----><!---->
                    </button>
                </div>
                <hr
                    class="v-divider v-theme--light my-2"
                    aria-orientation="horizontal"
                    role="separator"
                />
                <div
                    class="v-card-text d-flex justify-space-between flex-wrap flex-column flex-sm-row"
                >
                    <div class="mb-6 mb-sm-0">
                        <div class="d-flex align-center mb-4">
                            <h6 class="text-sm font-weight-medium me-2">
                                Salesperson:
                            </h6>
                            <div
                                class="v-input v-input--horizontal v-input--density-compact v-text-field"
                                style="inline-size: 8rem"
                            >
                                <!---->
                                <div class="v-input__control">
                                    <div
                                        class="v-field v-field--no-label v-field--variant-outlined v-theme--light"
                                        role="textbox"
                                    >
                                        <div class="v-field__overlay"></div>
                                        <div class="v-field__loader">
                                            <div
                                                class="v-progress-linear v-theme--light"
                                                role="progressbar"
                                                aria-hidden="true"
                                                aria-valuemin="0"
                                                aria-valuemax="100"
                                                style="
                                                    top: 0px;
                                                    height: 0px;
                                                    --v-progress-linear-height: 2px;
                                                    left: 50%;
                                                    transform: translateX(-50%);
                                                "
                                            >
                                                <!---->
                                                <div
                                                    class="v-progress-linear__background bg-primary"
                                                    style="width: 100%"
                                                ></div>
                                                <div
                                                    class="v-progress-linear__indeterminate"
                                                >
                                                    <div
                                                        class="v-progress-linear__indeterminate long bg-primary"
                                                    ></div>
                                                    <div
                                                        class="v-progress-linear__indeterminate short bg-primary"
                                                    ></div>
                                                </div>
                                                <!---->
                                            </div>
                                        </div>
                                        <!---->
                                        <div
                                            class="v-field__field"
                                            data-no-activator=""
                                        >
                                            <!----><label
                                                class="v-label v-field-label"
                                                for="input-348"
                                                ><!----><!----></label
                                            ><!----><input
                                                size="1"
                                                type="text"
                                                id="input-348"
                                                aria-describedby="input-348-messages"
                                                class="v-field__input"
                                            /><!---->
                                        </div>
                                        <!----><!---->
                                        <div class="v-field__outline">
                                            <div
                                                class="v-field__outline__start"
                                            ></div>
                                            <!---->
                                            <div
                                                class="v-field__outline__end"
                                            ></div>
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                                <!----><!---->
                            </div>
                        </div>
                        <div
                            class="v-input v-input--horizontal v-input--density-compact v-text-field"
                        >
                            <!---->
                            <div class="v-input__control">
                                <div
                                    class="v-field v-field--no-label v-field--variant-outlined v-theme--light"
                                    role="textbox"
                                >
                                    <div class="v-field__overlay"></div>
                                    <div class="v-field__loader">
                                        <div
                                            class="v-progress-linear v-theme--light"
                                            role="progressbar"
                                            aria-hidden="true"
                                            aria-valuemin="0"
                                            aria-valuemax="100"
                                            style="
                                                top: 0px;
                                                height: 0px;
                                                --v-progress-linear-height: 2px;
                                                left: 50%;
                                                transform: translateX(-50%);
                                            "
                                        >
                                            <!---->
                                            <div
                                                class="v-progress-linear__background bg-primary"
                                                style="width: 100%"
                                            ></div>
                                            <div
                                                class="v-progress-linear__indeterminate"
                                            >
                                                <div
                                                    class="v-progress-linear__indeterminate long bg-primary"
                                                ></div>
                                                <div
                                                    class="v-progress-linear__indeterminate short bg-primary"
                                                ></div>
                                            </div>
                                            <!---->
                                        </div>
                                    </div>
                                    <!---->
                                    <div
                                        class="v-field__field"
                                        data-no-activator=""
                                    >
                                        <!----><label
                                            class="v-label v-field-label"
                                            for="input-350"
                                            ><!----><!----></label
                                        ><!----><input
                                            placeholder="Thanks for your business"
                                            size="1"
                                            type="text"
                                            id="input-350"
                                            aria-describedby="input-350-messages"
                                            class="v-field__input"
                                        /><!---->
                                    </div>
                                    <!----><!---->
                                    <div class="v-field__outline">
                                        <div
                                            class="v-field__outline__start"
                                        ></div>
                                        <!---->
                                        <div
                                            class="v-field__outline__end"
                                        ></div>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            <!----><!---->
                        </div>
                    </div>
                    <div>
                        <table class="w-100">
                            <tr>
                                <td class="pe-16">Subtotal:</td>
                                <td class="text-end">
                                    <h6 class="text-sm font-weight-medium">
                                        $1800
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-16">Discount:</td>
                                <td class="text-end">
                                    <h6 class="text-sm font-weight-medium">
                                        $28
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-16">Tax:</td>
                                <td class="text-end">
                                    <h6 class="text-sm font-weight-medium">
                                        21%
                                    </h6>
                                </td>
                            </tr>
                        </table>
                        <hr
                            class="v-divider v-theme--light mt-4 mb-3"
                            aria-orientation="horizontal"
                            role="separator"
                        />
                        <table class="w-100">
                            <tr>
                                <td>Total:</td>
                                <td class="text-end">
                                    <h6 class="text-sm font-weight-medium">
                                        $1690
                                    </h6>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr
                    class="v-divider v-theme--light mt-2"
                    aria-orientation="horizontal"
                    role="separator"
                />
                <div class="v-card-text">
                    <p class="text-base font-weight-medium mb-1">Note:</p>
                    <div
                        class="v-input v-input--horizontal v-input--density-default v-textarea v-text-field"
                    >
                        <!---->
                        <div class="v-input__control">
                            <div
                                class="v-field v-field--no-label v-field--variant-outlined v-theme--light"
                                role="textbox"
                            >
                                <div class="v-field__overlay"></div>
                                <div class="v-field__loader">
                                    <div
                                        class="v-progress-linear v-theme--light"
                                        role="progressbar"
                                        aria-hidden="true"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                        style="
                                            top: 0px;
                                            height: 0px;
                                            --v-progress-linear-height: 2px;
                                            left: 50%;
                                            transform: translateX(-50%);
                                        "
                                    >
                                        <!---->
                                        <div
                                            class="v-progress-linear__background bg-primary"
                                            style="width: 100%"
                                        ></div>
                                        <div
                                            class="v-progress-linear__indeterminate"
                                        >
                                            <div
                                                class="v-progress-linear__indeterminate long bg-primary"
                                            ></div>
                                            <div
                                                class="v-progress-linear__indeterminate short bg-primary"
                                            ></div>
                                        </div>
                                        <!---->
                                    </div>
                                </div>
                                <!---->
                                <div
                                    class="v-field__field"
                                    data-no-activator=""
                                >
                                    <!----><label
                                        class="v-label v-field-label"
                                        for="input-353"
                                        ><!----><!----></label
                                    ><!----><textarea
                                        class="v-field__input"
                                        rows="2"
                                        id="input-353"
                                        aria-describedby="input-353-messages"
                                    ></textarea
                                    ><!----><!---->
                                </div>
                                <!----><!---->
                                <div class="v-field__outline">
                                    <div class="v-field__outline__start"></div>
                                    <!---->
                                    <div class="v-field__outline__end"></div>
                                    <!---->
                                </div>
                            </div>
                        </div>
                        <!----><!---->
                    </div>
                </div>
                <!----><!----><span class="v-card__underlay"></span>
            </div>
        </v-col>
        <v-col cols="12" md="3">
            <div
                class="v-card v-theme--light v-card--density-default v-card--variant-elevated mb-8"
            >
                <!---->
                <div class="v-card__loader">
                    <div
                        class="v-progress-linear v-theme--light"
                        role="progressbar"
                        aria-hidden="true"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        style="
                            top: 0px;
                            height: 0px;
                            --v-progress-linear-height: 2px;
                            left: 50%;
                            transform: translateX(-50%);
                        "
                    >
                        <!---->
                        <div
                            class="v-progress-linear__background"
                            style="width: 100%"
                        ></div>
                        <div class="v-progress-linear__indeterminate">
                            <div
                                class="v-progress-linear__indeterminate long"
                            ></div>
                            <div
                                class="v-progress-linear__indeterminate short"
                            ></div>
                        </div>
                        <!---->
                    </div>
                </div>
                <!----><!---->
                <div class="v-card-text">
                    <button
                        type="button"
                        class="v-btn v-btn--block v-btn--elevated v-theme--light bg-primary v-btn--density-default v-btn--size-default v-btn--variant-elevated mb-3"
                    >
                        <span class="v-btn__overlay"></span
                        ><span class="v-btn__underlay"></span
                        ><span class="v-btn__prepend"
                            ><svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true"
                                role="img"
                                tag="i"
                                class="v-icon notranslate v-theme--light v-icon--size-default iconify iconify--mdi"
                                width="1em"
                                height="1em"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    fill="currentColor"
                                    d="m4 6.03l7.5 3.22l-7.5-1V6.03m7.5 8.72L4 17.97v-2.22l7.5-1M2 3v7l15 2l-15 2v7l21-9L2 3Z"
                                ></path></svg></span
                        ><span class="v-btn__content" data-no-activator="">
                            Send Invoice </span
                        ><!----><!----></button
                    ><a
                        class="v-btn v-btn--block v-theme--light text-secondary v-btn--density-default v-btn--size-default v-btn--variant-outlined mb-3"
                        href="/materio-vuetify-vuejs-admin-template/demo-1/apps/invoice/preview/5036"
                        ><span class="v-btn__overlay"></span
                        ><span class="v-btn__underlay"></span
                        ><!----><span
                            class="v-btn__content"
                            data-no-activator=""
                        >
                            Preview </span
                        ><!----><!----></a
                    ><button
                        type="button"
                        class="v-btn v-btn--block v-theme--light text-secondary v-btn--density-default v-btn--size-default v-btn--variant-outlined"
                    >
                        <span class="v-btn__overlay"></span
                        ><span class="v-btn__underlay"></span
                        ><!----><span
                            class="v-btn__content"
                            data-no-activator=""
                        >
                            Save </span
                        ><!----><!---->
                    </button>
                </div>
                <!----><!----><span class="v-card__underlay"></span>
            </div>
            <div
                class="v-input v-input--horizontal v-input--density-default v-input--dirty v-input--readonly v-text-field v-select v-select--single v-select--selected mb-6"
            >
                <!---->
                <div class="v-input__control">
                    <div
                        class="v-field v-field--active v-field--appended v-field--dirty v-field--variant-outlined v-theme--light"
                        role="textbox"
                        aria-haspopup="menu"
                        aria-expanded="false"
                        aria-owns="v-menu-359"
                    >
                        <div class="v-field__overlay"></div>
                        <div class="v-field__loader">
                            <div
                                class="v-progress-linear v-theme--light"
                                role="progressbar"
                                aria-hidden="true"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                style="
                                    top: 0px;
                                    height: 0px;
                                    --v-progress-linear-height: 2px;
                                    left: 50%;
                                    transform: translateX(-50%);
                                "
                            >
                                <!---->
                                <div
                                    class="v-progress-linear__background bg-primary"
                                    style="width: 100%"
                                ></div>
                                <div class="v-progress-linear__indeterminate">
                                    <div
                                        class="v-progress-linear__indeterminate long bg-primary"
                                    ></div>
                                    <div
                                        class="v-progress-linear__indeterminate short bg-primary"
                                    ></div>
                                </div>
                                <!---->
                            </div>
                        </div>
                        <!---->
                        <div class="v-field__field" data-no-activator="">
                            <!----><label
                                class="v-label v-field-label"
                                for="input-357"
                                ><!---->Accept Payment Via</label
                            ><!---->
                            <div class="v-field__input" data-no-activator="">
                                <!---->
                                <div class="v-select__selection">
                                    <span class="v-select__selection-text"
                                        >Bank Account<!----></span
                                    >
                                </div>
                                <input
                                    readonly=""
                                    size="1"
                                    type="text"
                                    id="input-357"
                                    aria-describedby="input-357-messages"
                                />
                            </div>
                            <!---->
                        </div>
                        <!---->
                        <div class="v-field__append-inner">
                            <!----><svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true"
                                role="img"
                                tag="i"
                                class="v-icon notranslate v-theme--light v-icon--size-default iconify iconify--mdi"
                                width="1em"
                                height="1em"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    fill="currentColor"
                                    d="m7 10l5 5l5-5H7Z"
                                ></path>
                            </svg>
                        </div>
                        <div class="v-field__outline">
                            <div class="v-field__outline__start"></div>
                            <div class="v-field__outline__notch">
                                <label
                                    class="v-label v-field-label v-field-label--floating"
                                    aria-hidden="true"
                                    for="input-357"
                                    ><!---->Accept Payment Via</label
                                >
                            </div>
                            <div class="v-field__outline__end"></div>
                            <!---->
                        </div>
                    </div>
                </div>
                <!----><!---->
            </div>
            <div class="d-flex align-center justify-space-between">
                <label class="v-label" for="payment-terms"
                    ><!---->
                    Payment Terms
                </label>
                <div>
                    <div
                        class="v-input v-input--horizontal v-input--density-default v-input--dirty v-switch"
                    >
                        <!---->
                        <div class="v-input__control">
                            <div
                                class="v-selection-control v-selection-control--dirty v-selection-control--density-default"
                            >
                                <div
                                    class="v-selection-control__wrapper text-primary"
                                >
                                    <div class="v-switch__track"></div>
                                    <div class="v-selection-control__input">
                                        <!----><input
                                            id="payment-terms"
                                            aria-disabled="false"
                                            type="checkbox"
                                            aria-describedby="payment-terms-messages"
                                            value="true"
                                        />
                                        <div
                                            class="v-switch__thumb text-primary"
                                        >
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                                <!---->
                            </div>
                        </div>
                        <!----><!---->
                    </div>
                </div>
            </div>
            <div class="d-flex align-center justify-space-between">
                <label class="v-label" for="client-notes"
                    ><!---->
                    Client Notes
                </label>
                <div>
                    <div
                        class="v-input v-input--horizontal v-input--density-default v-input--dirty v-switch"
                    >
                        <!---->
                        <div class="v-input__control">
                            <div
                                class="v-selection-control v-selection-control--density-default"
                            >
                                <div class="v-selection-control__wrapper">
                                    <div class="v-switch__track"></div>
                                    <div class="v-selection-control__input">
                                        <!----><input
                                            id="client-notes"
                                            aria-disabled="false"
                                            type="checkbox"
                                            aria-describedby="client-notes-messages"
                                            value="true"
                                        />
                                        <div class="v-switch__thumb">
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                                <!---->
                            </div>
                        </div>
                        <!----><!---->
                    </div>
                </div>
            </div>
            <div class="d-flex align-center justify-space-between">
                <label class="v-label" for="payment-stub"
                    ><!---->
                    Payment Stub
                </label>
                <div>
                    <div
                        class="v-input v-input--horizontal v-input--density-default v-input--dirty v-switch"
                    >
                        <!---->
                        <div class="v-input__control">
                            <div
                                class="v-selection-control v-selection-control--density-default"
                            >
                                <div class="v-selection-control__wrapper">
                                    <div class="v-switch__track"></div>
                                    <div class="v-selection-control__input">
                                        <!----><input
                                            id="payment-stub"
                                            aria-disabled="false"
                                            type="checkbox"
                                            aria-describedby="payment-stub-messages"
                                            value="true"
                                        />
                                        <div class="v-switch__thumb">
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                                <!---->
                            </div>
                        </div>
                        <!----><!---->
                    </div>
                </div>
            </div>
        </v-col>
    </v-row>
</template>

<script setup></script>

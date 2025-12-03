(() => {
    /* page loader */
    function hideLoader() {
        const loader = document.getElementById("loader");
        loader.classList.add("d-none")
    }

    window.addEventListener("load", hideLoader);
    /* page loader */

    /* tooltip */
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl));

    /* popover  */
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popoverTriggerList].map((popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl));

    //switcher color pickers
    const pickrContainerPrimary = document.querySelector(".pickr-container-primary");
    const themeContainerPrimary = document.querySelector(".theme-container-primary");
    const pickrContainerBackground = document.querySelector(".pickr-container-background");
    const themeContainerBackground = document.querySelector(".theme-container-background");

    /* for theme primary */
    const nanoThemes = [
        [
            "nano",
            {
                defaultRepresentation: "RGB",
                components: {
                    preview: true,
                    opacity: false,
                    hue: true,

                    interaction: {
                        hex: false,
                        rgba: true,
                        hsva: false,
                        input: true,
                        clear: false,
                        save: false,
                    },
                },
            },
        ],
    ];
    const nanoButtons = [];
    let nanoPickr = null;
    for (const [theme, config] of nanoThemes) {
        const button = document.createElement("button");
        button.innerHTML = theme;
        nanoButtons.push(button);

        button.addEventListener("click", () => {
            const el = document.createElement("p");
            pickrContainerPrimary.appendChild(el);

            /* Delete previous instance */
            if (nanoPickr) {
                nanoPickr.destroyAndRemove();
            }

            /* Apply active class */
            for (const btn of nanoButtons) {
                btn.classList[btn === button ? "add" : "remove"]("active");
            }

            /* Create fresh instance */
            nanoPickr = new Pickr(
                Object.assign(
                    {
                        el: el,
                        theme: theme,
                        default: "#0162e8",
                    },
                    config
                )
            );

             /* Set events */
            nanoPickr.on("changestop", (source, instance) => {
                const color = instance.getColor().toRGBA();
                const html = document.querySelector("html");
                html.style.setProperty("--primary-rgb", `${Math.floor(color[0])}, ${Math.floor(color[1])}, ${Math.floor(color[2])}`);
                /* theme color picker */
                localStorage.setItem("primaryRGB", `${Math.floor(color[0])}, ${Math.floor(color[1])}, ${Math.floor(color[2])}`);
                updateColors();
            });
        });

        themeContainerPrimary.appendChild(button);
    }
    nanoButtons[0].click();
    /* for theme primary */

    /* for theme background */
    const nanoThemes1 = [
        [
            "nano",
            {
                defaultRepresentation: "RGB",
                components: {
                    preview: true,
                    opacity: false,
                    hue: true,

                    interaction: {
                        hex: false,
                        rgba: true,
                        hsva: false,
                        input: true,
                        clear: false,
                        save: false,
                    },
                },
            },
        ],
    ];
    const nanoButtons1 = [];
    let nanoPickr1 = null;
    for (const [theme, config] of nanoThemes1) {
        const button = document.createElement("button");
        button.innerHTML = theme;
        nanoButtons1.push(button);

        button.addEventListener("click", () => {
            const el = document.createElement("p");
            pickrContainerBackground.appendChild(el);

            /* Delete previous instance */
            if (nanoPickr1) {
                nanoPickr1.destroyAndRemove();
            }

            /* Apply active class */
            for (const btn of nanoButtons1) {
                btn.classList[btn === button ? "add" : "remove"]("active");
            }

            /* Create fresh instance */
            nanoPickr1 = new Pickr(
                Object.assign(
                    {
                        el: el,
                        theme: theme,
                        default: "#0162e8",
                    },
                    config
                )
            );

            /* Set events */
            nanoPickr1.on("changestop", (source, instance) => {
                const color = instance.getColor().toRGBA();
                const html = document.querySelector("html");
                html.style.setProperty("--body-bg-rgb", `${color[0]}, ${color[1]}, ${color[2]}`);
                html.style.setProperty("--light-rgb", `${color[0] + 14}, ${color[1] + 14}, ${color[2] + 14}`);
                html.style.setProperty("--form-control-bg", `rgb(${color[0] + 14}, ${color[1] + 14}, ${color[2] + 14})`);
                localStorage.removeItem("bgtheme");
                updateColors();
                html.setAttribute("data-theme-mode", "dark");
                html.setAttribute("data-menu-styles", "dark");
                html.setAttribute("data-header-styles", "dark");
                document.querySelector("#switcher-dark-theme").checked = true;
                localStorage.setItem("bodyBgRGB", `${color[0]}, ${color[1]}, ${color[2]}`);
                localStorage.setItem("bodylightRGB", `${color[0] + 14}, ${color[1] + 14}, ${color[2] + 14}`);
            });
        });
        themeContainerBackground.appendChild(button);
    }
    nanoButtons1[0].click();
    /* for theme background */

    /* header theme toggle */
    function toggleTheme() {
        const html = document.querySelector("html");
        if (html.getAttribute("data-theme-mode") === "dark") {
            html.setAttribute("data-theme-mode", "light");
            html.setAttribute("data-header-styles", "light");
            html.setAttribute("data-menu-styles", "light");
            if (!localStorage.getItem("primaryRGB")) {
                html.setAttribute("style", "");
            }
            html.removeAttribute("data-bg-theme");
            document.querySelector("#switcher-light-theme").checked = true;
            document.querySelector("#switcher-menu-light").checked = true;
            html.style.removeProperty("--body-bg-rgb", localStorage.bodyBgRGB);
            checkOptions();
            html.style.removeProperty("--light-rgb");
            html.style.removeProperty("--form-control-bg");
            html.style.removeProperty("--input-border");
            document.querySelector("#switcher-header-light").checked = true;
            document.querySelector("#switcher-menu-light").checked = true;
            document.querySelector("#switcher-light-theme").checked = true;
            document.querySelector("#switcher-background5").checked = false;
            document.querySelector("#switcher-background4").checked = false;
            document.querySelector("#switcher-background3").checked = false;
            document.querySelector("#switcher-background2").checked = false;
            document.querySelector("#switcher-background1").checked = false;
            localStorage.removeItem("valexdarktheme");
            localStorage.removeItem("valexMenu");
            localStorage.removeItem("valexHeader");
            localStorage.removeItem("bodylightRGB");
            localStorage.removeItem("bodyBgRGB");
            if (localStorage.getItem("valexlayout") != "horizontal") {
                html.setAttribute("data-menu-styles", "light");
            }
            html.setAttribute("data-header-styles", "light");
        } else {
            html.setAttribute("data-theme-mode", "dark");
            html.setAttribute("data-header-styles", "dark");
            if (!localStorage.getItem("primaryRGB")) {
                html.setAttribute("style", "");
            }
            html.setAttribute("data-menu-styles", "dark");
            document.querySelector("#switcher-dark-theme").checked = true;
            document.querySelector("#switcher-menu-dark").checked = true;
            document.querySelector("#switcher-header-dark").checked = true;
            checkOptions();
            document.querySelector("#switcher-menu-dark").checked = true;
            document.querySelector("#switcher-header-dark").checked = true;
            document.querySelector("#switcher-dark-theme").checked = true;
            document.querySelector("#switcher-background5").checked = false;
            document.querySelector("#switcher-background4").checked = false;
            document.querySelector("#switcher-background3").checked = false;
            document.querySelector("#switcher-background2").checked = false;
            document.querySelector("#switcher-background1").checked = false;
            localStorage.setItem("valexdarktheme", "true");
            localStorage.setItem("valexMenu", "dark");
            localStorage.setItem("valexHeader", "dark");
            localStorage.removeItem("bodylightRGB");
            localStorage.removeItem("bodyBgRGB");
        }
    }
    const layoutSetting = document.querySelector(".layout-setting");
    layoutSetting.addEventListener("click", toggleTheme);
    /* header theme toggle */

    /* Choices JS */
    document.addEventListener("DOMContentLoaded", () => {
        const genericExamples = document.querySelectorAll("[data-trigger]");
        for (let i = 0; i < genericExamples.length; ++i) {
            const element = genericExamples[i];
            new Choices(element, {
                allowHTML: true,
                placeholderValue: "This is a placeholder set in the config",
                searchPlaceholderValue: "Search",
            });
        }
    });
    /* Choices JS */

    /* footer year */
    document.getElementById("year").innerHTML = new Date().getFullYear();
    /* footer year */

    /* node waves */
    Waves.attach(".btn-wave", ["waves-light"]);
    Waves.init();
    /* node waves */

    /* card with close button */
    const DIV_CARD = ".card";
    const cardRemoveBtn = document.querySelectorAll('[data-bs-toggle="card-remove"]');
    cardRemoveBtn.forEach((ele) => {
        ele.addEventListener("click", function (e) {
        e.preventDefault();
        const card = this.closest(DIV_CARD);
        card.remove();
        return false;
        });
    });
    /* card with close button */

    /* card with fullscreen */
    const cardFullscreenBtn = document.querySelectorAll('[data-bs-toggle="card-fullscreen"]');
    cardFullscreenBtn.forEach((ele) => {
        ele.addEventListener("click", function (e) {
            const card = this.closest(DIV_CARD);
            card.classList.toggle("card-fullscreen");
            card.classList.remove("card-collapsed");
            e.preventDefault();
            return false;
        });
    });
    /* card with fullscreen */

    /* count-up */
    let i = 1;
    setInterval(() => {
        document.querySelectorAll(".count-up").forEach((ele) => {
            if (ele.getAttribute("data-count") >= i) {
                i = i + 1;
                ele.innerText = i;
            }
        });
    }, 10);
    /* count-up */

    /* header dropdowns scroll */
    const myHeadernotification = document.getElementById("header-notification-scroll");
    new SimpleBar(myHeadernotification, { autoHide: true });

    const myHeaderCart = document.getElementById("header-cart-items-scroll");
    new SimpleBar(myHeaderCart, { autoHide: true });
    /* header dropdowns scroll */
})();

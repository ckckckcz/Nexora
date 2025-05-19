document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const toggleButton = document.getElementById("toggle-sidebar");
    const mobileMenuButton = document.getElementById("mobile-menu-button");
    const mobileBackdrop = document.getElementById("mobile-backdrop");
    const chevronIcon = document.getElementById("chevron-icon");
    const sidebarTexts = document.querySelectorAll(".sidebar-text");
    const sidebarTooltips = document.querySelectorAll(".sidebar-tooltip");
    const sidebarSubmenus = document.querySelectorAll(".sidebar-submenu");
    const sidebarArrows = document.querySelectorAll(".sidebar-arrow");
    const mainContent = document.getElementById("main-content");

    // Check if elements exist before proceeding
    if (
        !sidebar ||
        !toggleButton ||
        !mobileMenuButton ||
        !mobileBackdrop ||
        !chevronIcon
    ) {
        console.error("One or more sidebar elements not found in the DOM.");
        return;
    }

    // Initialize sidebar state from localStorage (for desktop)
    const sidebarCollapsed =
        localStorage.getItem("sidebarCollapsed") === "true";

    // Set initial state based on screen size and saved preference
    if (window.innerWidth >= 768) {
        if (sidebarCollapsed) {
            collapseSidebar(false); // Don't animate on initial load
        } else {
            expandSidebar(false); // Don't animate on initial load
        }
    } else {
        // On mobile, always start with sidebar closed
        sidebar.classList.add("-translate-x-full");
        sidebar.classList.add("w-full");
        sidebar.classList.remove("w-16", "w-64");
    }

    // Toggle sidebar on button click (desktop)
    toggleButton.addEventListener("click", function () {
        if (sidebar.getAttribute("data-expanded") === "true") {
            collapseSidebar(true);
            localStorage.setItem("sidebarCollapsed", "true");
            toggleButton.setAttribute("aria-expanded", "false");
        } else {
            expandSidebar(true);
            localStorage.setItem("sidebarCollapsed", "false");
            toggleButton.setAttribute("aria-expanded", "true");
        }
    });

    // Mobile menu toggle
    mobileMenuButton.addEventListener("click", function () {
        const isOpen = !sidebar.classList.contains("-translate-x-full");
        if (isOpen) {
            closeMobileSidebar();
            mobileMenuButton.setAttribute("aria-expanded", "false");
        } else {
            openMobileSidebar();
            mobileMenuButton.setAttribute("aria-expanded", "true");
        }
    });

    // Close sidebar when clicking backdrop
    mobileBackdrop.addEventListener("click", function () {
        closeMobileSidebar();
        mobileMenuButton.setAttribute("aria-expanded", "false");
    });

    // Handle window resize with debouncing
    let resizeTimeout;
    window.addEventListener("resize", function () {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function () {
            if (window.innerWidth >= 768) {
                // Desktop view
                sidebar.classList.remove("-translate-x-full", "w-full");
                mobileBackdrop.classList.add("hidden");
                toggleButton.classList.remove("hidden");

                // Restore collapsed state from localStorage
                const sidebarCollapsed =
                    localStorage.getItem("sidebarCollapsed") === "true";
                if (sidebarCollapsed) {
                    collapseSidebar(false);
                } else {
                    expandSidebar(false);
                }
            } else {
                // Mobile view
                sidebar.classList.add("-translate-x-full", "w-full");
                sidebar.classList.remove("w-16", "w-64");
                toggleButton.classList.add("hidden");
                mobileBackdrop.classList.add("hidden");

                // Always show text on mobile
                sidebarTexts.forEach((text) => {
                    text.classList.remove("opacity-0", "invisible", "w-0");
                });

                // Hide tooltips on mobile
                sidebarTooltips.forEach((tooltip) => {
                    tooltip.classList.add("hidden");
                });
            }
        }, 100);
    });

    /**
     * Collapse the sidebar to icon-only mode
     * @param {boolean} animate - Whether to animate the transition
     */
    function collapseSidebar(animate = true) {
        sidebar.setAttribute("data-expanded", "false");
        sidebar.classList.remove("w-64");
        if (!animate) {
            sidebar.classList.add("transition-none");
            setTimeout(() => sidebar.classList.remove("transition-none"), 10);
        }
        sidebar.classList.add("w-16");
        toggleButton.style.left = "64px"; // Match collapsed width (w-16 = 64px)
        chevronIcon.classList.add("rotate-180");
        sidebarTexts.forEach((text) => {
            text.classList.add("opacity-0", "invisible", "w-0");
        });
        sidebarTooltips.forEach((tooltip) => {
            tooltip.classList.remove("hidden");
        });
        sidebarSubmenus.forEach((submenu) => {
            submenu.classList.add("hidden");
        });
        sidebarArrows.forEach((arrow) => {
            arrow.classList.add("opacity-0", "invisible", "w-0");
        });
        // Adjust main content padding
        mainContent.classList.remove("pl-80");
        mainContent.classList.add("pl-20");
    }

    /**
     * Expand the sidebar to full width
     * @param {boolean} animate - Whether to animate the transition
     */
    function expandSidebar(animate = true) {
        sidebar.setAttribute("data-expanded", "true");
        sidebar.classList.remove("w-16");
        if (!animate) {
            sidebar.classList.add("transition-none");
            setTimeout(() => sidebar.classList.remove("transition-none"), 10);
        }
        sidebar.classList.add("w-64");
        toggleButton.style.left = "256px"; // Match expanded width (w-64 = 256px)
        chevronIcon.classList.remove("rotate-180");
        sidebarTexts.forEach((text) => {
            text.classList.remove("opacity-0", "invisible", "w-0");
        });
        sidebarTooltips.forEach((tooltip) => {
            tooltip.classList.add("hidden");
        });
        sidebarArrows.forEach((arrow) => {
            arrow.classList.remove("opacity-0", "invisible", "w-0");
        });
        // Adjust main content padding
        mainContent.classList.remove("pl-20");
        mainContent.classList.add("pl-80");
    }

    /**
     * Open the sidebar on mobile
     */
    function openMobileSidebar() {
        sidebar.classList.remove("-translate-x-full");
        mobileBackdrop.classList.remove("hidden");
        setTimeout(() => {
            mobileBackdrop.classList.add("opacity-100");
        }, 10);
        document.body.classList.add("overflow-hidden");
        sidebarTexts.forEach((text) => {
            text.classList.remove("opacity-0", "invisible", "w-0");
        });
        sidebarTooltips.forEach((tooltip) => {
            tooltip.classList.add("hidden");
        });
    }

    /**
     * Close the sidebar on mobile
     */
    function closeMobileSidebar() {
        sidebar.classList.add("-translate-x-full");
        mobileBackdrop.classList.remove("opacity-100");
        setTimeout(() => {
            mobileBackdrop.classList.add("hidden");
        }, 300);
        document.body.classList.remove("overflow-hidden");
    }
});

document.addEventListener("DOMContentLoaded", function () {
    gsap.registerPlugin(ScrollTrigger);
    initAnimations();
});

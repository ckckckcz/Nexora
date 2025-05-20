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
        !chevronIcon ||
        !mainContent
    ) {
        console.error("One or more sidebar elements not found in the DOM.");
        return;
    }

    // Initialize sidebar state from localStorage (for desktop)
    const sidebarCollapsed = localStorage.getItem("sidebarCollapsed") === "true";

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
        // Apply mobile padding to main content
        mainContent.classList.remove("pl-22", "pl-72");
        mainContent.classList.add("pl-2", "pr-2", "pt-2");
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
                const sidebarCollapsed = localStorage.getItem("sidebarCollapsed") === "true";
                if (sidebarCollapsed) {
                    collapseSidebar(false);
                } else {
                    expandSidebar(false);
                }
                // Remove mobile padding, apply desktop padding
                mainContent.classList.remove("pl-2", "pr-2", "pt-2");
            } else {
                // Mobile view
                sidebar.classList.add("-translate-x-full", "w-full");
                sidebar.classList.remove("w-16", "w-64");
                toggleButton.classList.add("hidden");
                mobileBackdrop.classList.add("hidden");

                // Always show text and submenus on mobile
                sidebarTexts.forEach((text) => {
                    text.classList.remove("opacity-0", "invisible", "w-0");
                });
                sidebarTooltips.forEach((tooltip) => {
                    tooltip.classList.add("hidden");
                });
                sidebarSubmenus.forEach((submenu) => {
                    submenu.classList.remove("hidden"); // Ensure submenus are accessible on mobile
                });
                sidebarArrows.forEach((arrow) => {
                    arrow.classList.remove("opacity-0", "invisible", "w-0");
                });

                // Apply mobile padding to main content
                mainContent.classList.remove("pl-22", "pl-72");
                mainContent.classList.add("pl-2", "pr-2", "pt-2");
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
            submenu.classList.add("hidden"); // Hide submenus
        });
        sidebarArrows.forEach((arrow) => {
            arrow.classList.add("opacity-0", "invisible", "w-0");
        });
        // Reset Alpine.js submenu state
        document.querySelectorAll('[x-data]').forEach((el) => {
            if (el.__x) {
                el.__x.$data.open = false; // Reset Alpine.js 'open' state
            }
        });
        // Adjust main content padding
        mainContent.classList.remove("pl-72");
        mainContent.classList.add("pl-22");
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
        // Allow Alpine.js to control submenu visibility
        // Adjust main content padding
        mainContent.classList.remove("pl-22");
        mainContent.classList.add("pl-72");
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
        sidebarSubmenus.forEach((submenu) => {
            submenu.classList.remove("hidden"); // Ensure submenus are accessible on mobile
        });
        sidebarArrows.forEach((arrow) => {
            arrow.classList.remove("opacity-0", "invisible", "w-0");
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
        sidebarSubmenus.forEach((submenu) => {
            submenu.classList.add("hidden"); // Reset submenu state on close
        });
        sidebarArrows.forEach((arrow) => {
            arrow.classList.remove("rotate-180"); // Reset arrow rotation
        });
        // Reset Alpine.js submenu state
        document.querySelectorAll('[x-data]').forEach((el) => {
            if (el.__x) {
                el.__x.$data.open = false; // Reset Alpine.js 'open' state
            }
        });
    }
});

// Keep GSAP initialization separate
document.addEventListener("DOMContentLoaded", function () {
    gsap.registerPlugin(ScrollTrigger);
    initAnimations();
});
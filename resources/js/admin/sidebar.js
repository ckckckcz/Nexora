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
        toggleButton.classList.add("hidden");
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
            } else {
                // Mobile view
                sidebar.classList.add("-translate-x-full", "w-full");
                sidebar.classList.remove("w-16", "w-64");
                toggleButton.classList.add("hidden");
                mobileBackdrop.classList.add("hidden");
                
                // Always show text on mobile
                sidebarTexts.forEach(text => {
                    text.classList.remove("opacity-0", "invisible", "w-0");
                });
                
                // Hide tooltips on mobile
                sidebarTooltips.forEach(tooltip => {
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
        // Set data attribute for CSS targeting
        sidebar.setAttribute("data-expanded", "false");
        
        // Update classes for width
        sidebar.classList.remove("w-64");
        
        // If animate is false, temporarily disable transitions
        if (!animate) {
            sidebar.classList.add("transition-none");
            setTimeout(() => sidebar.classList.remove("transition-none"), 10);
        }
        
        sidebar.classList.add("w-16");
        
        // Rotate chevron icon
        chevronIcon.classList.add("rotate-180");
        
        // Hide text elements
        sidebarTexts.forEach(text => {
            text.classList.add("opacity-0", "invisible", "w-0");
        });
        
        // Show tooltips
        sidebarTooltips.forEach(tooltip => {
            tooltip.classList.remove("hidden");
        });
        
        // Hide submenus
        sidebarSubmenus.forEach(submenu => {
            submenu.classList.add("hidden");
        });
        
        // Hide dropdown arrows
        sidebarArrows.forEach(arrow => {
            arrow.classList.add("opacity-0", "invisible", "w-0");
        });
    }

    /**
     * Expand the sidebar to full width
     * @param {boolean} animate - Whether to animate the transition
     */
    function expandSidebar(animate = true) {
        // Set data attribute for CSS targeting
        sidebar.setAttribute("data-expanded", "true");
        
        // Update classes for width
        sidebar.classList.remove("w-16");
        
        // If animate is false, temporarily disable transitions
        if (!animate) {
            sidebar.classList.add("transition-none");
            setTimeout(() => sidebar.classList.remove("transition-none"), 10);
        }
        
        sidebar.classList.add("w-64");
        
        // Rotate chevron icon back
        chevronIcon.classList.remove("rotate-180");
        
        // Show text elements
        sidebarTexts.forEach(text => {
            text.classList.remove("opacity-0", "invisible", "w-0");
        });
        
        // Hide tooltips
        sidebarTooltips.forEach(tooltip => {
            tooltip.classList.add("hidden");
        });
        
        // Show dropdown arrows
        sidebarArrows.forEach(arrow => {
            arrow.classList.remove("opacity-0", "invisible", "w-0");
        });
        
        // Note: We don't automatically show submenus when expanding
        // as they should remain in their previous open/closed state
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
        
        // Always show text on mobile
        sidebarTexts.forEach(text => {
            text.classList.remove("opacity-0", "invisible", "w-0");
        });
        
        // Hide tooltips on mobile
        sidebarTooltips.forEach(tooltip => {
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
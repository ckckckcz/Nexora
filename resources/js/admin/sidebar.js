document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const toggleButton = document.getElementById("toggle-sidebar");
    const mobileMenuButton = document.getElementById("mobile-menu-button");
    const mobileBackdrop = document.getElementById("mobile-backdrop");
    const chevronIcon = document.getElementById("chevron-icon");
    const brandText = document.getElementById("brand-text");
    const navItems = document.querySelectorAll(
        "#nav-contain a span:not(.sidebar-tooltip), #nav-contain button span:not(.sidebar-tooltip), #logout-text"
    );
    const tooltips = document.querySelectorAll(".sidebar-tooltip");

    // Initialize sidebar state from localStorage (for desktop)
    const sidebarCollapsed =
        localStorage.getItem("sidebarCollapsed") === "true";
    if (sidebarCollapsed && window.innerWidth >= 768) {
        collapseSidebar();
    }

    // Toggle sidebar on button click (desktop)
    toggleButton.addEventListener("click", function () {
        if (
            sidebar.classList.contains("w-56") ||
            sidebar.classList.contains("w-64")
        ) {
            collapseSidebar();
            localStorage.setItem("sidebarCollapsed", "true");
            toggleButton.setAttribute("aria-expanded", "false");
        } else {
            expandSidebar();
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

    // Close sidebar when clicking outside on mobile
    document.addEventListener("click", function (event) {
        const isMobile = window.innerWidth < 768;
        const isOutsideSidebar =
            !sidebar.contains(event.target) &&
            event.target !== mobileMenuButton &&
            !mobileBackdrop.contains(event.target);
        if (
            isMobile &&
            isOutsideSidebar &&
            !sidebar.classList.contains("-translate-x-full")
        ) {
            closeMobileSidebar();
            mobileMenuButton.setAttribute("aria-expanded", "false");
        }
    });

    // Handle window resize with debouncing
    let resizeTimeout;
    window.addEventListener("resize", function () {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function () {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove("-translate-x-full", "w-full");
                sidebar.classList.add("w-56", "sm:w-64");
                mobileBackdrop.classList.add("hidden");
                toggleButton.classList.remove("hidden");
                const sidebarCollapsed =
                    localStorage.getItem("sidebarCollapsed") === "true";
                if (sidebarCollapsed) {
                    collapseSidebar();
                } else {
                    expandSidebar();
                }
            } else {
                sidebar.classList.add("w-full", "-translate-x-full");
                sidebar.classList.remove("w-56", "w-64", "w-16");
                toggleButton.classList.add("hidden");
                mobileBackdrop.classList.add("hidden");
            }
        }, 100);
    });

    function collapseSidebar() {
        sidebar.classList.remove("w-56", "w-64");
        sidebar.classList.add("w-16");
        chevronIcon.classList.add("rotate-180");
        brandText.classList.add("opacity-0", "hidden");
        navItems.forEach((item) => item.classList.add("opacity-0", "hidden"));
        tooltips.forEach((tooltip) => tooltip.classList.remove("hidden"));
    }

    function expandSidebar() {
        sidebar.classList.add("w-56", "sm:w-64");
        sidebar.classList.remove("w-16");
        chevronIcon.classList.remove("rotate-180");
        brandText.classList.remove("opacity-0", "hidden");
        navItems.forEach((item) =>
            item.classList.remove("opacity-0", "hidden")
        );
        tooltips.forEach((tooltip) => tooltip.classList.add("hidden"));
    }

    function openMobileSidebar() {
        sidebar.classList.remove("-translate-x-full");
        sidebar.classList.add("w-full");
        mobileBackdrop.classList.remove("hidden");
        mobileBackdrop.classList.add("opacity-100");
        document.body.classList.add("overflow-hidden");
    }

    function closeMobileSidebar() {
        sidebar.classList.add("-translate-x-full");
        sidebar.classList.remove("w-full");
        mobileBackdrop.classList.remove("opacity-100");
        mobileBackdrop.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
    }

    // Initialize sidebar state based on screen size
    if (window.innerWidth < 768) {
        sidebar.classList.add("w-full", "-translate-x-full");
        toggleButton.classList.add("hidden");
    } else {
        sidebar.classList.add("w-56", "sm:w-64");
        sidebar.classList.remove("w-full", "-translate-x-full");
    }
});

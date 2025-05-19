document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const toggleButton = document.getElementById("toggle-sidebar");
    
    // Function to update toggle button position
    function updateTogglePosition() {
        const isExpanded = sidebar.getAttribute("data-expanded") === "true";
        const sidebarWidth = isExpanded ? "16rem" : "4rem"; // 64px or 16px based on expanded state
        document.documentElement.style.setProperty('--sidebar-width', sidebarWidth);
    }
    
    // Initial position
    updateTogglePosition();
    
    // Update position when toggling sidebar
    toggleButton.addEventListener("click", function() {
        // Your existing toggle code here
        
        // Then update position after state change
        setTimeout(updateTogglePosition, 10); // Small delay to ensure state has changed
    });
    
    // Update on window resize
    window.addEventListener("resize", updateTogglePosition);
});
document.addEventListener("DOMContentLoaded", function () {
    const filterButton = document.getElementById("status-filter-btn");
    const filterText = document.getElementById("status-filter-text");
    const dropdown = document.getElementById("status-dropdown");
    const chevron = document.getElementById("status-chevron");
    const dropdownItems = dropdown.querySelectorAll("button[data-status]");

    // Toggle dropdown visibility
    filterButton.addEventListener("click", function (event) {
        event.stopPropagation();
        dropdown.classList.toggle("hidden");
        chevron.classList.toggle("fa-chevron-down");
        chevron.classList.toggle("fa-chevron-up");
    });

    // Handle dropdown item selection
    dropdownItems.forEach((item) => {
        item.addEventListener("click", function () {
            const selectedStatus = this.getAttribute("data-status");
            filterText.textContent =
                selectedStatus === "Semua" ? "Semua Status" : selectedStatus;
            dropdown.classList.add("hidden");
            chevron.classList.remove("fa-chevron-up");
            chevron.classList.add("fa-chevron-down");

            // Optional: Add custom event for status change handling
            const statusChangeEvent = new CustomEvent("statusChange", {
                detail: { status: selectedStatus },
            });
            document.dispatchEvent(statusChangeEvent);
        });
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", function (event) {
        if (
            !filterButton.contains(event.target) &&
            !dropdown.contains(event.target)
        ) {
            dropdown.classList.add("hidden");
            chevron.classList.remove("fa-chevron-up");
            chevron.classList.add("fa-chevron-down");
        }
    });
});

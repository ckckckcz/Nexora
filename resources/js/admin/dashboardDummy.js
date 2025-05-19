document.addEventListener("DOMContentLoaded", () => {
    const chartRef = document.getElementById("chartRef");
    const statCardsRef = document.getElementById("statCardsRef");
    const tableRef = document.getElementById("tableRef");
    const activitiesRef = document.getElementById("activitiesRef");
    let showToast = false;
    let showModal = false;
    let selectedStudent = null;
    let toastTimeout = null;

    const showNotification = (message) => {
        const toast = document.getElementById("toast");
        const toastMessage = document.getElementById("toastMessage");
        if (toastTimeout) clearTimeout(toastTimeout);
        toastMessage.textContent = message;
        toast.classList.remove("hidden");
        toast.classList.add("animate-fade-in-up");
        showToast = true;
        toastTimeout = setTimeout(() => {
            toast.classList.remove("animate-fade-in-up");
            toast.classList.add("hidden");
            showToast = false;
        }, 3000);
    };

    const openDetailModal = (student) => {
        selectedStudent = JSON.parse(student);
        const modal = document.getElementById("modal");
        const modalInitials = document.getElementById("modalInitials");
        const modalName = document.getElementById("modalName");
        const modalPosition = document.getElementById("modalPosition");
        const modalScore = document.getElementById("modalScore");
        modalInitials.textContent = selectedStudent.name
            .split(" ")
            .map((n) => n[0])
            .join("");
        modalName.textContent = selectedStudent.name;
        modalPosition.textContent = `${selectedStudent.position} di ${selectedStudent.company}`;
        modalScore.textContent = selectedStudent.score;
        modal.classList.remove("hidden");
        modal.classList.add("animate-scale-in");
        showModal = true;
    };

    // Initialize Chart.js
    if (chartRef) {
        const ctx = chartRef.getContext("2d");
        if (chartRef.chart) chartRef.chart.destroy();

        const gradientFill = ctx.createLinearGradient(0, 0, 0, 400);
        gradientFill.addColorStop(0, "rgba(30, 58, 138, 0.8)");
        gradientFill.addColorStop(1, "rgba(30, 58, 138, 0.2)");

        const chartData = {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            datasets: [
                {
                    label: "Aplikasi Magang",
                    data: [65, 78, 52, 91, 43, 56, 61, 87, 91, 94, 82, 73],
                    backgroundColor: gradientFill,
                    borderColor: "#1e3a8a",
                    borderWidth: 2,
                    borderRadius: 6,
                    tension: 0.3,
                },
            ],
        };

        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: "#1e3a8a",
                    titleColor: "#DEFC79",
                    bodyColor: "#fff",
                    padding: 12,
                    cornerRadius: 8,
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: "rgba(30, 58, 138, 0.1)",
                        drawBorder: false,
                    },
                    ticks: { color: "#64748b" },
                },
                x: { grid: { display: false }, ticks: { color: "#64748b" } },
            },
            animation: { duration: 2000, easing: "easeOutQuart" },
        };

        chartRef.chart = new Chart(ctx, {
            type: "bar",
            data: chartData,
            options: chartOptions,
        });
    }

    // Initialize GSAP animations
    if (typeof gsap !== "undefined") {
        gsap.from(statCardsRef.children, {
            y: 50,
            opacity: 0,
            duration: 0.8,
            stagger: 0.15,
            ease: "power3.out",
        });
        gsap.from(".chart-container", {
            y: 50,
            opacity: 0,
            duration: 0.8,
            delay: 0.4,
            ease: "power3.out",
        });
        gsap.from(activitiesRef.querySelectorAll("li"), {
            x: -30,
            opacity: 0,
            duration: 0.6,
            stagger: 0.1,
            delay: 0.6,
            ease: "power2.out",
        });
        gsap.from(tableRef.querySelectorAll("tr"), {
            y: 20,
            opacity: 0,
            duration: 0.5,
            stagger: 0.05,
            delay: 0.8,
            ease: "power2.out",
        });
    }

    // Event Listeners
    document.querySelectorAll(".detail-button").forEach((button) => {
        button.addEventListener("click", () =>
            openDetailModal(button.getAttribute("data-student"))
        );
    });

    document.getElementById("closeToast").addEventListener("click", () => {
        const toast = document.getElementById("toast");
        toast.classList.remove("animate-fade-in-up");
        toast.classList.add("hidden");
        showToast = false;
        if (toastTimeout) clearTimeout(toastTimeout);
    });

    document.querySelector(".close-modal").addEventListener("click", () => {
        const modal = document.getElementById("modal");
        modal.classList.remove("animate-scale-in");
        modal.classList.add("hidden");
        showModal = false;
    });

    document.querySelector(".submit-button").addEventListener("click", () => {
        showNotification("Detail rekomendasi telah dilihat");
        const modal = document.getElementById("modal");
        modal.classList.remove("animate-scale-in");
        modal.classList.add("hidden");
        showModal = false;
    });
});

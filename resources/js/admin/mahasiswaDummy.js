document.addEventListener("DOMContentLoaded", () => {
    // Initialize Lucide icons
    lucide.createIcons();

    // Initial data
    const initialStudents = [
        { id: 1, nim: "2019103001", name: "Ahmad Rizky", program: "S1", department: "Teknik Informatika", gender: "L", registrationDate: "2019-08-15" },
        { id: 2, nim: "2020104052", name: "Siti Nurhaliza", program: "S1", department: "Sistem Informasi", gender: "P", registrationDate: "2020-08-20" },
        { id: 3, nim: "2018102023", name: "Budi Santoso", program: "S1", department: "Teknik Elektro", gender: "L", registrationDate: "2018-08-10" },
    ];

    let students = [...initialStudents];
    let searchTerm = "";
    let departmentFilter = "Semua Jurusan";
    let genderFilter = "Semua";

    // DOM Elements
    const searchInput = document.getElementById("search-input");
    const departmentFilterBtn = document.getElementById("department-filter-btn");
    const departmentFilterText = document.getElementById("department-filter-text");
    const departmentDropdown = document.getElementById("department-dropdown");
    const genderFilterBtn = document.getElementById("gender-filter-btn");
    const genderFilterText = document.getElementById("gender-filter-text");
    const genderDropdown = document.getElementById("gender-dropdown");
    const studentTableBody = document.getElementById("student-table-body");
    const startIndex = document.getElementById("start-index");
    const endIndex = document.getElementById("end-index");
    const totalStudents = document.getElementById("total-students");

    // Check if all DOM elements exist
    if (!searchInput || !departmentFilterBtn || !departmentFilterText || !departmentDropdown || 
        !genderFilterBtn || !genderFilterText || !genderDropdown || !studentTableBody || 
        !startIndex || !endIndex || !totalStudents) {
        console.error("One or more DOM elements not found.");
        return;
    }

    // Format date function
    const formatDate = (dateString) => {
        const options = { year: "numeric", month: "long", day: "numeric" };
        return new Date(dateString).toLocaleDateString("id-ID", options);
    };

    // Filter students
    const filterStudents = () => {
        const filtered = students.filter((student) => {
            const matchesSearch = 
                student.nim.toLowerCase().includes(searchTerm.toLowerCase()) ||
                student.name.toLowerCase().includes(searchTerm.toLowerCase());
            const matchesDepartment = departmentFilter === "Semua Jurusan" || student.department === departmentFilter;
            const matchesGender = genderFilter === "Semua" || student.gender === genderFilter;
            return matchesSearch && matchesDepartment && matchesGender;
        });
        renderTable(filtered);
    };

    // Render table
    const renderTable = (filteredStudents) => {
        studentTableBody.innerHTML = "";
        if (filteredStudents.length > 0) {
            filteredStudents.forEach((student) => {
                const row = document.createElement("tr");
                row.className = "hover:bg-gray-50 transition-colors";
                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${student.nim}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${student.name}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${student.program}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${student.department}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${
                            student.gender === "L" ? "bg-green-100 text-green-800" : "bg-blue-100 text-blue-800"
                        }">
                            ${student.gender === "L" ? "Laki-laki" : "Perempuan"}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${formatDate(student.registrationDate)}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <button class="text-blue-600 hover:text-blue-900 inline-flex items-center view-btn" data-id="${student.id}">
                            <svg class="h-4 w-4 mr-1" id="eye-icon-${student.id}"></svg>
                            <span class="hidden sm:inline">Lihat</span>
                        </button>
                        <button class="text-yellow-600 hover:text-yellow-900 inline-flex items-center edit-btn" data-id="${student.id}">
                            <svg class="h-4 w-4 mr-1" id="edit-icon-${student.id}"></svg>
                            <span class="hidden sm:inline">Edit</span>
                        </button>
                        <button class="text-red-600 hover:text-red-900 inline-flex items-center delete-btn" data-id="${student.id}">
                            <svg class="h-4 w-4 mr-1" id="trash-icon-${student.id}"></svg>
                            <span class="hidden sm:inline">Hapus</span>
                        </button>
                    </td>
                `;
                studentTableBody.appendChild(row);
            });
        } else {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td colSpan="7" class="px-6 py-4 text-center text-sm text-gray-500">
                    Tidak ada data mahasiswa yang ditemukan
                </td>
            `;
            studentTableBody.appendChild(row);
        }
        updatePagination(filteredStudents);
    };

    // Update pagination
    const updatePagination = (filteredStudents) => {
        startIndex.textContent = 1;
        endIndex.textContent = filteredStudents.length;
        totalStudents.textContent = students.length;
    };

    // Event Listeners
    searchInput.addEventListener("input", (e) => {
        searchTerm = e.target.value;
        filterStudents();
    });

    departmentFilterBtn.addEventListener("click", () => {
        departmentDropdown.classList.toggle("hidden");
        genderDropdown.classList.add("hidden");
    });

    document.querySelectorAll("#department-dropdown button").forEach((btn) => {
        btn.addEventListener("click", (e) => {
            departmentFilter = e.target.getAttribute("data-dept");
            departmentFilterText.textContent = departmentFilter;
            departmentDropdown.classList.add("hidden");
            filterStudents();
        });
    });

    genderFilterBtn.addEventListener("click", () => {
        genderDropdown.classList.toggle("hidden");
        departmentDropdown.classList.add("hidden");
    });

    document.querySelectorAll("#gender-dropdown button").forEach((btn) => {
        btn.addEventListener("click", (e) => {
            genderFilter = e.target.getAttribute("data-gender");
            genderFilterText.textContent = genderFilter === "Semua" ? "Semua Jenis Kelamin" : genderFilter === "L" ? "Laki-laki" : "Perempuan";
            genderDropdown.classList.add("hidden");
            filterStudents();
        });
    });

    studentTableBody.addEventListener("click", (e) => {
        if (e.target.closest(".delete-btn")) {
            const id = e.target.closest(".delete-btn").getAttribute("data-id");
            if (confirm("Apakah Anda yakin ingin menghapus data mahasiswa ini?")) {
                students = students.filter((student) => student.id !== parseInt(id));
                filterStudents();
            }
        }
    });

    // Initial render to ensure data appears on load
    filterStudents();
});
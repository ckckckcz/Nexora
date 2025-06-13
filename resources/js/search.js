document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const tableRows = document.querySelectorAll('#table-body tr');
            
            tableRows.forEach(row => {
                // Get text content from relevant columns
                const mahasiswaName = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                const dosenName = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';
                const perusahaanName = row.querySelector('td:nth-child(4)')?.textContent.toLowerCase() || '';
                
                // Search in nama mahasiswa, nama dosen, and nama perusahaan
                if (mahasiswaName.includes(searchTerm) || 
                    dosenName.includes(searchTerm) || 
                    perusahaanName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
});

@extends('layouts.dosen')
@section('dosen')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rekomendasi Magang</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/react/18.2.0/umd/react.production.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/18.2.0/umd/react-dom.production.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/7.24.7/babel.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>

    <body>
        <div id="root"></div>
        <script type="text/babel">
            const { useState } = React;

            // Komponen untuk dropdown status rekomendasi
            const StatusDropdown = ({ initialStatus, onChange }) => {
                return (
                    <select
                        className="border border-gray-300 rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                        value={initialStatus}
                        onChange={(e) => onChange(e.target.value)}
                    >
                        <option value="Direkomendasikan">Direkomendasikan</option>
                        <option value="Tidak Direkomendasikan">Tidak Direkomendasikan</option>
                    </select>
                );
            };

            // Komponen untuk modal detail mahasiswa
            const DetailModal = ({ student, onClose, onStatusChange, onSave }) => {
                const [tempStatus, setTempStatus] = useState(student.status);

                return (
                    <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                        <div className="bg-white rounded-lg p-6 max-w-md w-full">
                            <h2 className="text-xl font-bold mb-4 text-gray-900">{student.name}</h2>
                            <div className="space-y-2">
                                <p><strong className="text-gray-700">NIM:</strong> {student.nim}</p>
                                <p><strong className="text-gray-700">Nilai Vikor:</strong> {student.vikor}</p>
                                <p><strong className="text-gray-700">Ranking:</strong> {student.ranking}</p>
                                <p><strong className="text-gray-700">Perusahaan:</strong> {student.company}</p>
                                <div className="flex items-center space-x-2">
                                    <strong className="text-gray-700">Status:</strong>
                                    <StatusDropdown
                                        initialStatus={tempStatus}
                                        onChange={setTempStatus}
                                    />
                                </div>
                            </div>
                            <div className="mt-4 flex justify-end space-x-2">
                                <button
                                    onClick={() => onSave(student.id, tempStatus)}
                                    className="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 text-sm"
                                >
                                    Simpan
                                </button>
                                <button
                                    onClick={onClose}
                                    className="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 text-sm"
                                >
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                );
            };

            // Komponen utama
            const App = () => {
                const [students, setStudents] = useState(@json($mahasiswas));

                const [selectedStudent, setSelectedStudent] = useState(null);

                // Fungsi untuk mengubah status rekomendasi
                const handleStatusChange = (id, newStatus) => {
                    setStudents(students.map(student =>
                        student.id === id ? { ...student, status: newStatus } : student
                    ));
                };

                // Fungsi untuk menyimpan perubahan status
                const handleSave = (id, newStatus) => {
                    setStudents(students.map(student =>
                        student.id === id ? { ...student, status: newStatus } : student
                    ));
                    setSelectedStudent(null); // Tutup modal setelah menyimpan
                };

                // Function to view profile details - redirects to profile page
                const viewProfile = (nim) => {
                    window.location.href = `/dosen/magang/rekomendasi-magang/profile/${nim}`;
                };

                return (
                    <div className="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
                        <header className="mb-8">
                            <h1 className="text-3xl font-bold text-blue-900">Rekomendasi Magang 🕰️</h1>
                            <p className="mt-2 text-gray-600 font-medium">List Mahasiswa Bimbingan</p>
                        </header>

                        <section className="bg-white rounded-2xl border border-gray-200">
                            <div className="p-4 sm:p-6 flex flex-col gap-4">
                                <div className="flex flex-col lg:flex-row sm:items-left sm:justify-between gap-4">
                                    <div className="flex flex-col gap-3 sm:flex-row sm:items-center sm:flex-wrap flex-grow">
                                        {/* Search Input */}
                                        <div className="relative flex-grow max-w-full sm:max-w-md">
                                            <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i className="fas fa-search text-gray-400"></i>
                                            </div>
                                            <input
                                                type="text"
                                                className="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm"
                                                placeholder="Cari berdasarkan NIM atau Nama"
                                            />
                                        </div>

                                        {/* Filter Dropdown for Skema Magang */}
                                        <div className="relative w-full sm:w-auto">
                                            <button
                                                className="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 focus:outline-none w-full sm:w-auto text-sm"
                                            >
                                                <i className="fas fa-filter text-gray-500"></i>
                                                <span>Semua Skema</span>
                                                <i className="fas fa-chevron-down text-gray-300"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                {/* Table */}
                                <div className="overflow-x-auto">
                                    <table className="min-w-full divide-y divide-gray-200">
                                        <thead className="bg-gray-50">
                                            <tr>
                                                <th scope="col" className="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    No
                                                </th>
                                                <th scope="col" className="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nama
                                                </th>
                                                <th scope="col" className="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                                    NIM
                                                </th>
                                                <th scope="col" className="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody className="bg-white divide-y divide-gray-200">
                                            {students.map((student, index) => (
                                                <tr key={student.id}>
                                                    <td className="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {index + 1}
                                                    </td>
                                                    <td className="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {student.name}
                                                    </td>
                                                    <td className="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {student.nim}
                                                    </td>
                                                    <td className="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                        <div className="flex space-x-2">
                                                            <button
                                                                onClick={() => viewProfile(student.nim)}
                                                                className="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-200 text-sm"
                                                            >
                                                                Detail Profil
                                                            </button>
                                                            <button
                                                                onClick={() => setSelectedStudent(student)}
                                                                className="inline-flex items-center px-3 py-1.5 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors duration-200 text-sm"
                                                            >
                                                                Update Status
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            ))}
                                        </tbody>
                                    </table>
                                </div>

                                {/* Pagination */}
                                <div className="px-4 sm:px-6 py-4 bg-white border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                    <div className="flex-1 flex justify-between sm:hidden">
                                        <button className="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                            Sebelumnya
                                        </button>
                                        <button className="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                            Selanjutnya
                                        </button>
                                    </div>
                                    <div className="sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                        <div>
                                            <p className="text-sm text-gray-700">
                                                Menampilkan <span className="font-medium">1</span> sampai <span className="font-medium">{students.length}</span> dari <span className="font-medium">{students.length}</span> data
                                            </p>
                                        </div>
                                        <div>
                                            <nav className="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                                <button className="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                    <span className="sr-only">Previous</span>
                                                    <svg className="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fillRule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clipRule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button aria-current="page" className="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                    1
                                                </button>
                                                <button className="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                    <span className="sr-only">Next</span>
                                                    <svg className="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd" />
                                                    </svg>
                                                </button>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        {selectedStudent && (
                            <DetailModal
                                student={selectedStudent}
                                onClose={() => setSelectedStudent(null)}
                                onStatusChange={handleStatusChange}
                                onSave={handleSave}
                            />
                        )}
                    </div>
                );
            };
            // Render aplikasi
            const root = ReactDOM.createRoot(document.getElementById('root'));
            root.render(<App />);
        </script>
    </body>

    </html>
@endsection
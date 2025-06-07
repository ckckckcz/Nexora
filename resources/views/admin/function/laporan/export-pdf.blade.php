<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 6px 20px 5px 20px;
            line-height: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 4px 3px;
        }

        th {
            text-align: left;
        }

        .d-block {
            display: block;
        }

        img.image {
            width: 80px;
            height: 80px;
            max-width: 150px;
            max-height: 150px;
        }

        .font-bold {
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .p-1 {
            padding: 5px 1px 5px 1px;
        }

        .font-10 {
            font-size: 10pt;
        }

        .font-11 {
            font-size: 11pt;
        }

        .font-12 {
            font-size: 12pt;
        }

        .font-13 {
            font-size: 13pt;
        }

        .border-bottom-header {
            border-bottom: 1px solid;
        }

        .border-all,
        .border-all th,
        .border-all td {
            border: 1px solid;
        }

        .table-sm td, .table-sm th {
            padding: 0.2rem;
            font-size: 0.8rem;
        }
    </style>
</head>

<body>
    <table class="border-bottom-header">
        <tr>
            <td width="15%" class="text-center"><img src="{{ public_path('polinema-bw.png')}}" width="100px" height="100px"></td>
            <td width="85%">
                <span class="text-center d-block font-11 font-bold mb-1">KEMENTERIAN
                    PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</span>
                <span class="text-center d-block font-13 font-bold mb-1">POLITEKNIK NEGERI
                    MALANG</span>
                <span class="text-center d-block font-10">Jl. Soekarno-Hatta No. 9 Malang
                    65141</span>
                <span class="text-center d-block font-10">Telepon (0341) 404424 Pes. 101-
                    105, 0341-404420, Fax. (0341) 404420</span>
                <span class="text-center d-block font-10">Laman: www.polinema.ac.id</span>
            </td>
        </tr>
    </table>
    <h3 class="text-center">LAPORAN DATA MAHASISWA MAGANG</h4>
        <table class="border-all table-sm">
            <thead class="table-sm">
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Nama Program Studi</th>
                    <th>Jenis Kelamin</th>
                    <th>Nama Dosen</th>
                    <th>Nama Perusahaan</th>
                    <th>Posisi Magang</th>
                    <th>Tipe Perusahaan</th>
                    <th>Tipe Skema</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporan as $l)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $l['nama_mahasiswa'] }}</td>
                        <td>{{ $l['nama_program_studi'] }}</td>
                        <td>{{ $l['jenis_kelamin'] }}</td>
                        <td>{{ $l['nama_dosen'] }}</td>
                        <td>{{ $l['nama_perusahaan'] }}</td>
                        <td>{{ $l['posisi_magang'] }}</td>
                        <td>{{ $l['tipe_perusahaan'] }}</td>
                        <td>{{ $l['nama_skema'] }}</td>
                        <td>{{ $l['tanggal_mulai'] }}</td>
                        <td>{{ $l['tanggal_selesai'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>

</html>

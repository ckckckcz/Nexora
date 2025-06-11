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

        /* Styling khusus untuk tabel identitas mahasiswa */
        .identitas-table {
            border: 1px solid #000;
            border-collapse: collapse;
            width: 60%;
            margin-top: 16px;
            margin-bottom: 20px;
            font-size: 11pt;
            margin-left: auto;
            margin-right: auto;
        }
        .identitas-table td {
            border: 1px solid #000;
            padding: 4px 8px;
            vertical-align: top;
        }
        .identitas-label {
            width: 30%;
            font-weight: bold;
            background: #f5f5f5;
        }
        .identitas-separator {
            width: 2%;
            text-align: center;
            background: #f5f5f5;
        }
        .identitas-value {
            width: 68%;
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
        
        {{-- Tambahkan tabel identitas mahasiswa di sini --}}
        <h3 class="text-center">LOG BOOK KEGIATAN</h3>
    <table class="identitas-table">
        <tr>
            <td class="identitas-label">Nama</td>
            <td class="identitas-separator">:</td>
            <td class="identitas-value">{{ $laporan['student'][0]->nama_mahasiswa ?? '-' }}</td>
        </tr>
        <tr>
            <td class="identitas-label">NIM</td>
            <td class="identitas-separator">:</td>
            <td class="identitas-value">{{ $laporan['student'][0]->nim ?? '-' }}</td>
        </tr>
        <tr>
            <td class="identitas-label">Program Studi</td>
            <td class="identitas-separator">:</td>
            <td class="identitas-value">{{ $laporan['student'][0]->nama_program_studi ?? '-' }}</td>
        </tr>
        <tr>
            <td class="identitas-label">Nama Mitra</td>
            <td class="identitas-separator">:</td>
            <td class="identitas-value">{{ $laporan['student'][0]->nama_perusahaan ?? '-' }}</td>
        </tr>
    </table>

    <table class="border-all table-sm">
        <thead class="table-sm">
            <tr>
                <th class="text-center">Hari, Tanggal</th>
                <th class="text-center">Jam Masuk</th>
                <th class="text-center">Jam Pulang</th>
                <th class="text-center">Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan['logs'] as $log)
                <tr>
                    <td class="text-center">{{ date('d-m-Y', strtotime($log->tanggal)) ?? '' }}</td>
                    <td class="text-center">{{ $log->jam_masuk ?? '' }}</td>
                    <td class="text-center">{{ $log->jam_pulang ?? '' }}</td>
                    <td>{{ $log->kegiatan ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <table style="width:100%; margin-top:40px; border:none;">
        <tr>
            <td style="width:40%; text-align:center; vertical-align:top;">
                Mahasiswa,<br><br><br><br><br><br><br><br><br><br>
                <span style="display:block; margin-top:10px;">
                    {{ $laporan['student'][0]->nama_mahasiswa ?? '-' }}
                </span>
            </td>
            <td style="width:20%; text-align:center; vertical-align:top;">
                Mengetahui,
            </td>
            <td style="width:40%; text-align:center; vertical-align:top;">
                Dosen Pembimbing,<br><br><br><br><br><br><br><br><br><br>
                <span style="display:block; margin-top:10px;">
                    {{auth()->user()->dosen->nama_dosen ?? ''}}
                </span>
            </td>
        </tr>
    </table>
</body>

</html>

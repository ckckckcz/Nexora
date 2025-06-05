<table class="table-auto border-collapse border border-gray-300 w-full text-left">
    <thead>
        <tr>
            <th class="border border-gray-300 px-4 py-2">Nama Perusahaan</th>
            @foreach($criteriaNames as $criteria)
                <th class="border border-gray-300 px-4 py-2">{{ ucfirst(str_replace('_', ' ', $criteria)) }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @forelse($matriks as $row)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $row['nama_perusahaan'] ?? 'N/A' }}</td>
                @foreach($criteriaNames as $criteria)
                    <td class="border border-gray-300 px-4 py-2">{{ $row[$criteria] ?? 'N/A' }}</td>
                @endforeach
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($criteriaNames) + 1 }}" class="border border-gray-300 px-4 py-2 text-center">No data available</td>
            </tr>
        @endforelse
    </tbody>
</table>

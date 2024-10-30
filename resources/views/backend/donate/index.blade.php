@extends('backend.layout.main')
@section('content')

<!-- Konten Utama -->
<main id="mainContent" class="main-content flex-1 p-6 overflow-y-auto transition-all duration-300">
    <!-- Header Manajemen Donasi -->
    <div class="flex flex-col lg:flex-row justify-between items-center mb-6">
        <h1 class="text-3xl lg:text-4xl font-semibold text-green-700 mb-4 lg:mb-0 text-center lg:text-left">Daftar Donasi</h1>
    </div>

    <!-- Tabel Donasi -->
    <div class="bg-white p-4 rounded-lg shadow-lg overflow-x-auto">
        <h3 class="text-xl font-bold mb-4">Daftar Donasi</h3>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">No</th>
                    <th class="py-2 px-4 border">Nama Donatur</th>
                    <th class="py-2 px-4 border">Jenis Donasi</th>
                    <th class="py-2 px-4 border">Jumlah Donasi</th>
                    <th class="py-2 px-4 border">Nama Barang</th>
                    <th class="py-2 px-4 border">Jumlah Barang</th>
                    <th class="py-2 px-4 border">Tanggal Kadaluarsa</th>
                    <th class="py-2 px-4 border">Pesan Donatur</th>
                    <th class="py-2 px-4 border">Aksi</th>
                </tr>
            </thead>
            
            <tbody id="donateTableBody">
                @forelse ($donates as $index => $donate)
                    <tr class="donate-row hover:bg-gray-100">
                        <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border">{{ $donate->name }}</td>
                        <td class="py-2 px-4 border">{{ $donate->donation_type }}</td>
                        <td class="py-2 px-4 border">{{ $donate->amount ? number_format($donate->amount) . ' IDR' : '-' }}</td>
                        <td class="py-2 px-4 border">{{ $donate->item_name ?? '-' }}</td>
                        <td class="py-2 px-4 border">{{ $donate->item_qty ?? '-' }}</td>
                        <td class="py-2 px-4 border">{{ $donate->expired_date ? $donate->expired_date : '-' }}</td>
                        <td class="py-2 px-4 border">{{ \Illuminate\Support\Str::limit($donate->message, 20, '...') ?? '-' }}</td>
                        <td class="py-2 px-4 border flex justify-around">
                            <a href="{{ route('listdonate.show',$donate->id) }}"><button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition duration-200">
                                <i class="bi bi-eye"></i> Lihat
                            </button></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-4">
                            <span class="text-gray-500">Data belum tersedia</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Responsif -->
    <div class="mt-6 flex flex-col lg:flex-row justify-between items-center">
        <button onclick="prevPage()" class="bg-gray-200 text-gray-600 px-4 py-2 rounded-lg shadow hover:bg-gray-300 transition duration-200 w-full lg:w-auto mb-4 lg:mb-0 text-center">
            <i class="bi bi-arrow-left"></i> Sebelumnya
        </button>
        <button onclick="nextPage()" class="bg-gray-200 text-gray-600 px-4 py-2 rounded-lg shadow hover:bg-gray-300 transition duration-200 w-full lg:w-auto text-center">
            Berikutnya <i class="bi bi-arrow-right"></i>
        </button>
    </div>
</main>

<!-- Script Paginasi -->
<script>
    const rows = document.querySelectorAll('.donate-row');
    const rowsPerPage = 5;
    let currentPage = 1;

    function displayRows() {
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        rows.forEach((row, index) => {
            row.style.display = (index >= start && index < end) ? 'table-row' : 'none';
        });
    }

    function nextPage() {
        if (currentPage < Math.ceil(rows.length / rowsPerPage)) {
            currentPage++;
            displayRows();
        }
    }

    function prevPage() {
        if (currentPage > 1) {
            currentPage--;
            displayRows();
        }
    }

    // Tampilkan halaman pertama saat halaman dimuat
    displayRows();
</script>

@endsection

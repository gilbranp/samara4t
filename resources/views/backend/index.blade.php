@extends('backend.layout.main')
@section('content')

<!-- Konten Utama -->
<main id="mainContent" class="main-content flex-1 p-6 overflow-y-auto transition-all duration-300">
    <!-- Kartu Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-4 rounded-lg shadow-lg transition-transform transform hover:scale-105">
            <i class="bi bi-currency-exchange"></i>
            <h3 class="text-xl font-bold">Total Donasi Uang</h3>
            <p class="text-2xl">{{ number_format($totalCashDonate, 0, ',', '.') }} IDR</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-lg transition-transform transform hover:scale-105">
            <i class="bi bi-box"></i>
            <h3 class="text-xl font-bold">Total Donasi Barang</h3>
            <p class="text-2xl">{{ $totalItemDonate }} Barang</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-lg transition-transform transform hover:scale-105">
            <i class="bi bi-people"></i>
            <h3 class="text-xl font-bold">Total Pengguna Aktif</h3>
            <p class="text-2xl">{{ $totalActiveUsers }}</p> <!-- Menampilkan pengguna aktif -->
        </div>
    </div>

    <!-- Tabel Donasi -->
    <div class="bg-white p-4 rounded-lg shadow-lg overflow-x-auto">
        <h3 class="text-xl font-bold mb-4">Daftar Donasi Terbaru</h3>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">Nama Donatur</th>
                    <th class="py-2 px-4 border">Nomor Telepon</th>
                    <th class="py-2 px-4 border">Jenis Donasi</th>
                    <th class="py-2 px-4 border">Jumlah Donasi</th>
                    <th class="py-2 px-4 border">Nama Barang</th>
                    <th class="py-2 px-4 border">Jumlah Barang</th>
                    <th class="py-2 px-4 border">Tanggal Kadaluarsa</th>
                    <th class="py-2 px-4 border">Pesan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($donates as $donation)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border">{{ $donation->name }}</td>
                    <td class="py-2 px-4 border">08xxx</td>
                    <td class="py-2 px-4 border">{{ $donation->donation_type }}</td>
                    <td class="py-2 px-4 border">{{ number_format($donation->amount, 0, ',', '.') }} IDR</td>
                    <td class="py-2 px-4 border">{{ $donation->item_name ?? '-' }}</td>
                    <td class="py-2 px-4 border">{{ $donation->item_qty ?? '-' }}</td>
                    <td class="py-2 px-4 border">{{ $donation->expired_date }}</td>
                    <td class="py-2 px-4 border">{{ \Illuminate\Support\Str::limit($donation->message, 30, '...') ?? '-' }}</td>

                </tr>
                @empty
                <tr>
                    <td colspan="8" class="py-2 px-4 border text-center">Tidak ada donasi tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>

@endsection

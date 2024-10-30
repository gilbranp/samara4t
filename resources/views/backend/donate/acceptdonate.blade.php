@extends('backend.layout.main')
@section('content')

<main class="main-content flex-1 p-6 overflow-y-auto transition-all duration-300">
<div class="container mx-auto p-6">
    <!-- Header Section -->
    <div class="bg-green-600 text-white p-6 rounded-lg shadow-lg mb-8 text-center lg:text-left">
        <h1 class="text-3xl font-bold">Terima Donasi</h1>
        <p class="mt-2">
            Terima kasih telah bergabung sebagai penerima donasi. Di bawah ini adalah informasi mengenai donasi yang telah Anda terima.
        </p>
    </div>

    <!-- Donasi Terbaru -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-green-700 mb-4">Donasi Terbaru</h2>
        <div class="space-y-4">
            <!-- Donasi Item -->
            <div class="border-b pb-4">
                <h3 class="text-lg font-semibold">Bantuan Pangan - Rp 500.000</h3>
                <p class="text-sm text-gray-600">Diterima pada: 10 Oktober 2024</p>
                <div class="mt-2">
                    <span class="text-sm text-white bg-green-500 px-3 py-1 rounded-full">Terkonfirmasi</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Donasi -->
    <div class="bg-white p-6 mt-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-green-700 mb-4">Status Donasi</h2>

        <!-- Membuat tabel menjadi responsif -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">#</th>
                        <th class="py-2 px-4 border">Jenis Donasi</th>
                        <th class="py-2 px-4 border">Jumlah</th>
                        <th class="py-2 px-4 border">Tanggal Diterima</th>
                        <th class="py-2 px-4 border">Status</th>
                        <th class="py-2 px-4 border">Lacak Paket</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border">1</td>
                        <td class="py-2 px-4 border">Bantuan Pangan</td>
                        <td class="py-2 px-4 border">Rp 500.000</td>
                        <td class="py-2 px-4 border">10 Oktober 2024</td>
                        <td class="py-2 px-4 border">
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Terkonfirmasi</span>
                        </td>
                        <td class="py-2 px-4 border">
                            <a href="">
                                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Lacak</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center mt-8">
        <a href="#" class="bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-600 transition duration-300">
            Ajukan Donasi Lagi
        </a>
    </div>
</div>
</main>

@endsection

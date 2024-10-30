@extends('backend.layout.main')

@section('content')
<main class="main-content flex-1 p-6 overflow-y-auto">
    <div class="container mx-auto p-6">
        <!-- Profil Header Section -->
        <div class="bg-green-600 text-white p-6 rounded-lg shadow-lg mb-8 text-center lg:text-left">
            <h1 class="text-3xl font-bold">Profil Penerima Donasi</h1>
            <p class="mt-2">
                Detail informasi penerima donasi.
            </p>
        </div>

        <!-- Profil Detail Section -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <!-- Informasi Utama Penerima -->
            <div class="flex items-center mb-8">
                <div class="w-24 h-24 mr-6">
                    <img src="{{ asset('path/to/selfie.jpg') }}" alt="Foto Penerima" class="w-full h-full object-cover rounded-full shadow-lg">
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-green-700">Dina Rahmawati</h2>
                    <p class="text-gray-600">@dinahrahma</p>
                    <p class="text-gray-600">Kontak: 081234567890</p>
                    <p class="text-gray-600">Pekerjaan: Ibu Rumah Tangga</p>
                </div>
            </div>

            <!-- Deskripsi atau Bio -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Alamat</h3>
                <p class="text-gray-600">
                    Jl. Merpati No. 123, RT 04 RW 05, Desa Tanjung, Kecamatan Banyumas, Kabupaten Banyumas.
                </p>
            </div>

            <!-- Statistik Donasi yang Diterima -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <!-- Total Donasi Uang yang Diterima -->
                <div class="bg-green-50 p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-2xl font-semibold text-green-700 mb-2">Total Donasi Uang</h3>
                    <p class="text-4xl font-bold">Rp 5.000.000</p>
                    <p class="text-gray-600 mt-2">Dari 12 donatur</p>
                </div>

                <!-- Total Donasi Makanan yang Diterima -->
                <div class="bg-green-50 p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-2xl font-semibold text-green-700 mb-2">Total Donasi Makanan</h3>
                    <p class="text-4xl font-bold">20 Paket</p>
                    <p class="text-gray-600 mt-2">Dari 8 donatur</p>
                </div>
            </div>

            <!-- Riwayat Donasi -->
            <div>
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Riwayat Donasi</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-2 px-4 border">#</th>
                                <th class="py-2 px-4 border">Jenis Donasi</th>
                                <th class="py-2 px-4 border">Jumlah</th>
                                <th class="py-2 px-4 border">Tanggal</th>
                                <th class="py-2 px-4 border">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border">1</td>
                                <td class="py-2 px-4 border">Uang</td>
                                <td class="py-2 px-4 border">Rp 500.000</td>
                                <td class="py-2 px-4 border">10 Oktober 2024</td>
                                <td class="py-2 px-4 border">
                                    <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Selesai</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border">2</td>
                                <td class="py-2 px-4 border">Makanan</td>
                                <td class="py-2 px-4 border">5 Paket</td>
                                <td class="py-2 px-4 border">12 Oktober 2024</td>
                                <td class="py-2 px-4 border">
                                    <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Selesai</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border">3</td>
                                <td class="py-2 px-4 border">Uang</td>
                                <td class="py-2 px-4 border">Rp 2.000.000</td>
                                <td class="py-2 px-4 border">15 Oktober 2024</td>
                                <td class="py-2 px-4 border">
                                    <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Selesai</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection

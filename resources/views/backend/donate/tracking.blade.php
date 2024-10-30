@extends('backend.layout.main')
@section('content')
<main class="main-content flex-1 p-6 overflow-y-auto transition-all duration-300">
<div class="container mx-auto p-6">
    <!-- Heading Section -->
    <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg mb-8 text-center lg:text-left">
        <h1 class="text-3xl font-bold">Lacak Pesanan - ID #12345</h1>
        <p class="mt-2">
            Lihat status terkini Distribusi pesanan Anda.
        </p>
    </div>

    <!-- Info Pesanan -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-2xl font-semibold text-green-600 mb-4">Informasi Pesanan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p><strong>Nomor Pesanan:</strong> #12345</p>
                <p><strong>Jenis Donasi:</strong> Pangan</p>
                <p><strong>Jumlah:</strong> 10 Kg Beras</p>
            </div>
            <div>
                <p><strong>Penerima:</strong> Yayasan Peduli</p>
                <p><strong>Tanggal Pesanan:</strong> 12 Oktober 2024</p>
                <p><strong>Status Pesanan:</strong> <span class="text-green-600 font-bold">Dalam Distribusi</span></p>
            </div>
        </div>
    </div>

    <!-- Status Tracking -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-2xl font-semibold text-green-600 mb-4">Lacak Status Distribusi</h2>
        <div class="relative">
            <div class="border-l-2 border-green-500 absolute h-full top-0 left-4"></div>
            <ul class="space-y-8">
                <!-- Status 1 -->
                <li class="flex items-center">
                    <div class="bg-green-500 text-white rounded-full w-8 h-8 flex items-center justify-center">
                        <span class="font-bold">1</span>
                    </div>
                    <div class="ml-6">
                        <p class="text-lg font-semibold">Pesanan Diproses</p>
                        <p class="text-sm text-gray-600">12 Oktober 2024 - Gudang Pusat</p>
                    </div>
                </li>
                <!-- Status 2 -->
                <li class="flex items-center">
                    <div class="bg-green-500 text-white rounded-full w-8 h-8 flex items-center justify-center">
                        <span class="font-bold">2</span>
                    </div>
                    <div class="ml-6">
                        <p class="text-lg font-semibold">Pesanan Dikirim</p>
                        <p class="text-sm text-gray-600">13 Oktober 2024 - Jasa Distribusi</p>
                    </div>
                </li>
                <!-- Status 3 -->
                <li class="flex items-center">
                    <div class="bg-green-500 text-white rounded-full w-8 h-8 flex items-center justify-center">
                        <span class="font-bold">3</span>
                    </div>
                    <div class="ml-6">
                        <p class="text-lg font-semibold">Dalam Perjalanan</p>
                        <p class="text-sm text-gray-600">14 Oktober 2024 - Kota Tujuan</p>
                    </div>
                </li>
                <!-- Status 4 -->
                <li class="flex items-center">
                    <div class="bg-gray-300 text-white rounded-full w-8 h-8 flex items-center justify-center">
                        <span class="font-bold">4</span>
                    </div>
                    <div class="ml-6">
                        <p class="text-lg font-semibold">Pesanan Tiba</p>
                        <p class="text-sm text-gray-600">Estimasi 15 Oktober 2024 - Lokasi Penerima</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Kembali ke Daftar -->
    <div class="text-right">
        <a href="/managedonate"><button class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300">
            Kembali ke Daftar Pesanan
        </button></a>
    </div>
</div>
</main>
@endsection

@extends('frontend.layout.main')
@section('content')

<!-- Konten Sukses Donasi -->
<div class="container mx-auto my-10 px-4">
    <!-- Notifikasi Sukses -->
    <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-8 rounded-lg text-center shadow-lg">
        <h2 class="text-2xl md:text-3xl font-bold mb-3">Terima Kasih atas Donasi Anda!</h2>
        <p class="text-lg md:text-xl mb-3">Donasi Anda sangat berarti dan akan membawa manfaat bagi yang membutuhkan.</p>
        <div class="border-t border-green-400 my-4"></div>
        <p class="text-md md:text-lg">Anda telah berhasil berdonasi dengan rincian sebagai berikut:</p>
    </div>

    <!-- Detail Donasi -->
    <div class="bg-white rounded-lg shadow-lg mt-6 p-6 md:p-8">
        <h3 class="text-xl md:text-2xl font-semibold text-center mb-6">Detail Donasi</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700">
            <div>
                <p><span class="font-semibold">Nama Donatur:</span> name</p>
                <p><span class="font-semibold">Nomor Telepon:</span> 08888</p>
                <p><span class="font-semibold">Jenis Donasi:</span> uang</p>
            </div>
            <div>
                <p><span class="font-semibold">Jumlah Uang:</span> 33333 IDR</p>
                <p><span class="font-semibold">Barang:</span> -</p>
                <p><span class="font-semibold">Jumlah Barang:</span> -</p>
            </div>
        </div>
        <!-- Pesan Donatur -->
        <div class="text-center mt-6">
            <p class="font-semibold text-lg">Pesan:</p>
            <p class="text-gray-700 text-md md:text-lg mt-2 leading-relaxed break-words max-w-md mx-auto px-4 sm:px-0">
                hello worldd
            </p>
        </div>
    </div>

    <!-- Tombol Tindakan Lanjutan -->
    <div class="flex flex-col sm:flex-row justify-center items-center mt-8 space-y-4 sm:space-y-0 sm:space-x-4">
        <a href="#" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg text-center transition-transform transform hover:scale-105">Lihat Riwayat Donasi</a>
        <a href="/dashboard" class="w-full sm:w-auto bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-lg text-center transition-transform transform hover:scale-105">Kembali ke Beranda</a>
    </div>
</div>

@endsection

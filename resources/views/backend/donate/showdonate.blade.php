@extends('backend.layout.main')

@section('content')
<section class="main-content flex-1 p-6 overflow-y-auto transition-all duration-300">
<div class="container mx-auto p-4">
    <div class="max-w-3xl mx-auto bg-white rounded shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4 text-center sm:text-left">Detail Donasi</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="font-semibold">Nama Donatur:</label>
                <p class="text-gray-700">{{ $donate->name }}</p>
            </div>

            <div>
                <label class="font-semibold">Tipe Donasi:</label>
                <p class="text-gray-700">{{ $donate->donation_type }}</p>
            </div>

            <div>
                <label class="font-semibold">Jumlah Donasi:</label>
                <p class="text-gray-700">{{ $donate->amount ? number_format($donate->amount) . ' IDR' : '-' }}</p>
            </div>

            <div>
                <label class="font-semibold">Nama Barang:</label>
                <p class="text-gray-700">{{ $donate->item_name ?? '-' }}</p>
            </div>

            <div>
                <label class="font-semibold">Jumlah Barang:</label>
                <p class="text-gray-700">{{ $donate->item_qty ?? '-' }}</p>
            </div>

            <div>
                <label class="font-semibold">Tanggal Kedaluwarsa:</label>
                <p class="text-gray-700">{{ $donate->expired_date ?? '-' }}</p>
            </div>

            <div class="col-span-1 sm:col-span-2">
                <label class="font-semibold">Pesan dari Donatur:</label>
                <p class="text-gray-700 break-words whitespace-pre-wrap">{{ $donate->message ?? '-' }}</p>
            </div>
        </div>

        <div class="mt-6 flex justify-center sm:justify-end">
            <a href="{{ route('listdonate.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-200">
                Kembali
            </a>
        </div>
    </div>
</div>
</section>
@endsection

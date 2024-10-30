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
                <label class="font-semibold">Nomor Telepon:</label>
                <p class="text-gray-700">{{ $donate->phone }}</p>
            </div>

            @if($donate->address)
            <div class="col-span-1 sm:col-span-2">
                <label class="font-semibold">Alamat:</label>
                <p class="text-gray-700 break-words">{{ $donate->address }}</p>
            </div>
            @endif

            <div>
                <label class="font-semibold">Tipe Donasi:</label>
                <p class="text-gray-700">{{ $donate->donation_type }}</p>
            </div>

            @if($donate->amount)
            <div>
                <label class="font-semibold">Jumlah Donasi:</label>
                <p class="text-gray-700">{{ number_format($donate->amount) . ' IDR' }}</p>
            </div>
            @endif

            @if($donate->item_qty)
            <div>
                <label class="font-semibold">Jumlah Barang:</label>
                <p class="text-gray-700">{{ $donate->item_qty }}</p>
            </div>
            @endif

            @if($donate->expired_date)
            <div>
                <label class="font-semibold">Tanggal Kedaluwarsa:</label>
                <p class="text-gray-700">{{ $donate->expired_date }}</p>
            </div>
            @endif

            @if($donate->donation_option)
            <div>
                <label class="font-semibold">Opsi Donasi:</label>
                <p class="text-gray-700">{{ $donate->donation_option }}</p>
            </div>
            @endif

            @if($donate->resi_number)
            <div>
                <label class="font-semibold">Nomor Resi:</label>
                <p class="text-gray-700">{{ $donate->resi_number }}</p>
            </div>
            @endif

            @if($donate->jasa_distribusi)
            <div>
                <label class="font-semibold">Jasa Distribusi:</label>
                <p class="text-gray-700">{{ $donate->jasa_distribusi }}</p>
            </div>
            @endif

            @if($donate->payment_option)
            <div>
                <label class="font-semibold">Metode Pembayaran:</label>
                <p class="text-gray-700">{{ $donate->payment_option }}</p>
            </div>
            @endif

            @if($donate->message)
            <div class="col-span-1 sm:col-span-2">
                <label class="font-semibold">Pesan dari Donatur:</label>
                <p class="text-gray-700 break-words whitespace-pre-wrap">{{ $donate->message }}</p>
            </div>
            @endif

            @if($donate->transfer_receipt)
                <div>
                    <label class="font-semibold">Foto Bukti Transfer:</label>
                    <p class="text-gray-700">
                        <a href="{{ asset('storage/' . $donate->transfer_receipt) }}" target="_blank" class="text-blue-500 underline">Lihat Bukti Transfer</a>
                    </p>
                </div>
            @endif

            <div>
                <label class="font-semibold">Status Donasi:</label>
                <p class="text-gray-700">{{ $donate->status }}</p>
            </div>
        </div>

        <div class="mt-6 flex justify-center sm:justify-between">
            <a href="{{ route('listdonate.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-200">
                Kembali
            </a>
        
            <!-- Button untuk ACC dan Tolak -->
            @if (Auth::user()->level === 'Administrator')
                 <form action="{{ route('listdonate.updateStatus', ['id' => $donate->id, 'status' => 'sukses']) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menyetujui donasi ini?');">
                @csrf
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-200">ACC</button>
            </form>
            
            <form action="{{ route('listdonate.updateStatus', ['id' => $donate->id, 'status' => 'ditolak']) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menolak donasi ini?');">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-200">Tolak</button>
            </form>
            @endif
           
        </div>
        
    </div>
</div>
</section>
@endsection

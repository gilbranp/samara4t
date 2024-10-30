@extends('backend.layout.main')
@section('content')

<!-- Konten Utama -->
<main id="mainContent" class="main-content flex-1 p-6 overflow-y-auto transition-all duration-300">
    <h1 class="text-3xl lg:text-4xl font-semibold text-green-700 mb-4 text-center">Detail Pengguna</h1>

    <!-- Detail Pengguna -->
    <div class="bg-white p-6 rounded-lg shadow-lg mt-5">
        <h2 class="text-xl font-bold mb-4">Informasi Pengguna</h2>
        
        <div class="mb-4">
            <strong>Nama Pengguna:</strong>
            <span>{{ $user->name }}</span>
        </div>

        <div class="mb-4">
            <strong>Username:</strong>
            <span>{{ $user->username }}</span>
        </div>

        <div class="mb-4">
            <strong>Level:</strong>
            <span>{{ $user->level }}</span>
        </div>

        <div class="mb-4">
            <strong>Status:</strong>
            <span class="px-3 py-1 rounded-full text-xs lg:text-sm 
                {{ $user->is_active ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                {{ $user->is_active ? 'Aktif' : 'Tidak Aktif' }}
            </span>
        </div>

        <div class="mb-4">
            <strong>Alamat:</strong>
            <span>{{ $user->address }}</span>
        </div>

        <div class="mb-4">
            <strong>Nomor Telepon:</strong>
            <span>{{ $user->phone }}</span>
        </div>

        <div class="mb-4">
            <strong>Pekerjaan:</strong>
            <span>{{ $user->job }}</span>
        </div>

        <div class="mb-4">
            <strong>Organisasi:</strong>
            <span>{{ $user->organitation ?? 'Tidak ada' }}</span>
        </div>

        <div class="mb-4 flex items-center">
            <strong>Foto Selfie:</strong>
            <div class="ml-2">
                @if ($user->selfie)
                    <img src="{{ asset('storage/' . $user->selfie) }}" alt="Selfie" class="w-48 h-48 object-cover rounded-md">
                @else
                    <span>Tidak ada foto selfie.</span>
                @endif
            </div>
        </div>

        <div class="mb-4 flex items-center">
            <strong>Foto Rumah:</strong>
            <div class="ml-2">
                @if ($user->house_photo)
                    <img src="{{ asset('storage/' . $user->house_photo) }}" alt="Foto Rumah" class="w-48 h-48 object-cover rounded-md">
                @else
                    <span>Tidak ada foto rumah.</span>
                @endif
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('manageuser.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                Kembali ke Daftar Pengguna
            </a>
        </div>
    </div>
</main>

@endsection

@extends('frontend.layout.main')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
        <h1 class="text-4xl font-bold text-red-600">403</h1>
        <h2 class="text-xl font-semibold mb-4">Akses Ditolak</h2>
        <p>Halaman ini tidak tersedia, silahkan kembali ke halaman yang tersedia saja</p>
        <div class="mt-4">
            <a href="{{ url('/') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection

@extends('backend.layout.main')

@section('content')
<section class="main-content flex-1 p-6 overflow-y-auto transition-all duration-300">
    <div class="container mx-auto p-4">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-3xl font-bold mb-4 text-center text-blue-600">Forum Diskusi (Grup Chat)</h2>

            <div class="overflow-y-auto h-96 border border-gray-300 rounded-lg p-4 mb-4 bg-gray-50 shadow-inner">
                <!-- Static Chat Example -->
                <div class="mb-3">
                    <div class="flex items-start mb-1">
                        <span class="font-semibold text-blue-600">Admin:</span>
                        <p class="ml-2 text-gray-700">Selamat datang di forum diskusi! Bagaimana kabar semuanya?</p>
                    </div>
                    <span class="text-xs text-gray-500">10:00 AM</span>
                </div>

                <div class="mb-3">
                    <div class="flex items-start mb-1">
                        <span class="font-semibold text-green-600">User1:</span>
                        <p class="ml-2 text-gray-700">Saya baik-baik saja! Terima kasih telah menginisiasi diskusi ini.</p>
                    </div>
                    <span class="text-xs text-gray-500">10:02 AM</span>
                </div>

                <div class="mb-3">
                    <div class="flex items-start mb-1">
                        <span class="font-semibold text-red-600">User2:</span>
                        <p class="ml-2 text-gray-700">Apakah ada topik khusus yang ingin kita bahas hari ini?</p>
                    </div>
                    <span class="text-xs text-gray-500">10:05 AM</span>
                </div>

                <div class="mb-3">
                    <div class="flex items-start mb-1">
                        <span class="font-semibold text-blue-600">Admin:</span>
                        <p class="ml-2 text-gray-700">Saya berpikir untuk membahas tentang perkembangan teknologi terbaru.</p>
                    </div>
                    <span class="text-xs text-gray-500">10:06 AM</span>
                </div>
            </div>

            <h3 class="text-lg font-semibold mb-2">Kirim Pesan</h3>
            <form action="#" method="POST">
                <div class="mb-4">
                    <textarea id="message" name="message" rows="3" class="mt-1 p-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="Masukkan pesan" required></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

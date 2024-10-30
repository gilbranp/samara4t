@extends('frontend.layout.main')
@section('content')
   <!-- Hero Section -->
   <section class="h-screen flex items-center justify-center text-center relative overflow-hidden bg-cover" style="background-image: url('assets/img/awal.jpg');">
    <div class="absolute inset-0 bg-gradient-to-r from-green-800 to-green-600 opacity-70"></div>
    <div class="relative z-10 p-8 text-white">
        <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-lg fade-in">Bersama Kita Akhiri Kelaparan</h1>
        <p class="text-lg md:text-2xl mb-6 drop-shadow-md fade-in">Setiap donasi Anda membawa harapan baru bagi mereka yang membutuhkan.</p>
        <a href="/donate" class="bg-yellow-500 hover:bg-yellow-600 text-white py-3 px-8 rounded-lg text-lg transition duration-300 shadow-lg fade-in">Donasi Sekarang</a>
    </div>
</section>

{{-- <!-- Tentang Kami -->
<section id="about" class="py-16 bg-green-600 text-white">
  <div class="container mx-auto px-6">
      <h2 class="text-4xl font-bold text-center mb-8">Tentang Kami</h2>
      <div class="flex flex-col md:flex-row items-center">
          <div class="md:w-1/2 mb-6 md:mb-0">
              <img src="{{ asset('assets/img/logo.png') }}" alt="Tentang Kami" class="rounded-lg shadow-2xl transform transition duration-500 hover:scale-105">
          </div>
          <div class="md:w-1/2 md:pl-8">
              <p class="mb-6 text-lg md:text-xl leading-relaxed text-justify">
                  <span class="font-semibold text-2xl">Selamat datang di <span class="text-yellow-300">SAMARA</span>!</span> 
                  Kami adalah sebuah inisiatif yang lahir dari kepedulian untuk mengatasi masalah kelaparan di seluruh dunia. 
                  Dengan semangat berbagi, kami menggalang donasi dan mendistribusikan makanan kepada mereka yang sangat membutuhkannya.
              </p>
              <p class="mb-6 text-lg md:text-xl leading-relaxed text-justify">
                  Kami percaya, setiap orang berhak mendapatkan makanan yang cukup dan bergizi. Misi kami adalah menciptakan dunia tanpa kelaparan, dengan berkolaborasi bersama komunitas lokal, organisasi, dan individu yang memiliki visi yang sama.
              </p>
              <ul class="list-disc list-inside mb-4 text-lg md:text-xl">
                  <li class="my-2">Menggalang dana untuk memenuhi kebutuhan pangan.</li>
                  <li class="my-2">Distribusi makanan ke daerah-daerah yang membutuhkan perhatian.</li>
                  <li class="my-2">Meningkatkan kesadaran tentang pentingnya mengurangi limbah makanan.</li>
              </ul>
              <p class="mb-6 text-lg md:text-xl leading-relaxed text-justify">
                  Bergabunglah dengan kami dalam menciptakan dampak positif! Setiap sumbangan, sekecil apapun, sangat berarti dan bisa mengubah hidup mereka yang kelaparan. 
                  Bersama, kita bisa memastikan bahwa tidak ada yang perlu merasakan lapar.
              </p>
          </div>
      </div>
  </div>
</section>

    <!-- Donasi Terkumpul dalam Card -->
    <section id="donation" class="py-16 bg-green-600 text-center text-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-8">Donasi Terkumpul</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 justify-center mb-8">
                <!-- Card 1: Grafik Donasi -->
                <div class="bg-green-700 p-8 shadow-lg rounded-lg transition-transform transform hover:scale-105">
                    <h3 class="text-2xl font-bold mb-6">Grafik Donasi</h3>
                    <canvas id="donationChart" width="200" height="200"></canvas>
                </div>
                <!-- Card 2: Foto Tempat Penerima Donasi -->
                <div class="bg-green-700 p-8 shadow-lg rounded-lg transition-transform transform hover:scale-105">
                    <h3 class="text-2xl font-bold mb-6 text-white">Tempat Penerima Donasi</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Penerima Donasi 1 -->
                        <div class="relative">
                            <img src="{{ asset('assets/img/yayasan.jpg') }}" alt="Tempat 1" class="rounded-md mb-4 mx-auto">
                            <h4 class="text-lg font-semibold text-white">Panti Asuhan A</h4>
                            <p class="text-gray-200">Telah menerima 5.000 paket makanan.</p>
                        </div>
                        <!-- Penerima Donasi 2 -->
                        <div class="relative">
                            <img src="{{ asset('assets/img/yayasan.jpg') }}" alt="Tempat 2" class="rounded-md mb-4 mx-auto">
                            <h4 class="text-lg font-semibold text-white">Panti Asuhan B</h4>
                            <p class="text-gray-200">Telah menerima 10.000 paket makanan.</p>
                        </div>
                        <!-- Penerima Donasi 3 -->
                        <div class="relative">
                            <img src="{{ asset('assets/img/yayasan.jpg') }}" alt="Tempat 3" class="rounded-md mb-4 mx-auto">
                            <h4 class="text-lg font-semibold text-white">Komunitas C</h4>
                            <p class="text-gray-200">Telah menerima 7.000 paket makanan.</p>
                        </div>
                        <!-- Penerima Donasi 4 -->
                        <div class="relative">
                            <img src="{{ asset('assets/img/yayasan.jpg') }}" alt="Tempat 4" class="rounded-md mb-4 mx-auto">
                            <h4 class="text-lg font-semibold text-white">Lembaga Sosial D</h4>
                            <p class="text-gray-200">Telah menerima 8.000 paket makanan.</p>
                        </div>
                    </div>
                
                    <!-- Tombol Lihat Detail -->
                    <div class="text-center mt-8">
                        <a href="/detail-penerima" class="inline-block px-8 py-3 bg-white text-green-700 font-semibold rounded-md shadow-lg hover:bg-green-600 hover:text-white transition duration-300">
                            Lihat Semua Penerima Donasi
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Mengapa SAMARA -->
    <section id="about" class="py-16 bg-green-600 text-center text-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold mb-12 fade-in">Mengapa SAMARA?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="bg-green-700 p-8 shadow-lg rounded-lg transition transform hover:scale-105">
                    <div class="text-yellow-400 text-5xl mb-4">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Bantuan Tepat Sasaran</h3>
                    <p class="text-gray-200">Donasi Anda akan kami salurkan langsung kepada yang membutuhkan dengan transparansi penuh.</p>
                </div>
                <div class="bg-green-700 p-8 shadow-lg rounded-lg transition transform hover:scale-105">
                    <div class="text-yellow-400 text-5xl mb-4">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Pengelolaan Berkelanjutan</h3>
                    <p class="text-gray-200">SAMARA memastikan proses donasi yang ramah lingkungan dan berkelanjutan.</p>
                </div>
                <div class="bg-green-700 p-8 shadow-lg rounded-lg transition transform hover:scale-105">
                    <div class="text-yellow-400 text-5xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Komunitas Global</h3>
                    <p class="text-gray-200">Bergabung dengan ribuan pendonatur di seluruh dunia yang peduli akan masa depan tanpa kelaparan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Organisasi yang Berkontribusi -->
    <section id="contributors" class="py-16 bg-green-600 text-center text-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold mb-12 fade-in">Organisasi yang Sudah Berkontribusi Besar</h2>
            <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-10 space-y-10 md:space-y-0">
                <div class="bg-green-700 p-6 shadow-lg rounded-lg w-64">
                    <img src="{{ asset('assets/img/banjarnegara.jpg') }}" alt="Organisasi 1" class="rounded-md mb-4 mx-auto">
                    <h3 class="text-xl font-bold">Yayasan A</h3>
                    <p class="text-gray-200">Telah menyumbangkan lebih dari 10.000 paket makanan.</p>
                </div>
                <div class="bg-green-700 p-6 shadow-lg rounded-lg w-64">
                    <img src="{{ asset('assets/img/banjarnegara.jpg') }}" alt="Organisasi 2" class="rounded-md mb-4 mx-auto">
                    <h3 class="text-xl font-bold">Yayasan B</h3>
                    <p class="text-gray-200">Menjadi mitra strategis dalam program penghapusan kelaparan.</p>
                </div>
                <div class="bg-green-700 p-6 shadow-lg rounded-lg w-64">
                    <img src="{{ asset('assets/img/banjarnegara.jpg') }}" alt="Organisasi 3" class="rounded-md mb-4 mx-auto">
                    <h3 class="text-xl font-bold">Yayasan C</h3>
                    <p class="text-gray-200">Berperan aktif dalam pemberian bantuan darurat.</p>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
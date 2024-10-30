<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMARA</title>
    <!-- Tailwind CSS CDN (versi stabil) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans leading-normal tracking-normal">

  <!-- Navbar -->
<nav class="bg-green-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
          <div class="flex items-center">
              <a href="/" class="text-white text-2xl font-bold">SAMARA</a>
              {{-- <div class="hidden md:block ml-10 space-x-4">
                  <a href="/#about" class="text-gray-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Tentang Kami</a>
                  <a href="/#donation" class="text-gray-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Donasi Terkumpul</a>
                  <a href="/#contributors" class="text-gray-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Organisasi Kontributor</a>
                
              </div> --}}
          </div>
          <div class="hidden md:block">
            @if (Auth::user())
            <a href="/dashboard" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">Masuk Dashboard</a>
            <a href="/donate" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md text-sm font-medium">Donasi Sekarang</a>
            @else
              <a href="/donate" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md text-sm font-medium">Donasi Sekarang</a>
                <a href="/login" class="bg-blue-500 text-white hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                @endif
          </div>
          <!-- Mobile menu button -->
          <div class="-mr-2 flex md:hidden">
              <button id="mobile-menu-button" class="bg-green-600 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-800 focus:ring-white">
                  <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                  </svg>
                  <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>
          </div>
      </div>
  </div>

  <!-- Mobile menu -->
  <div class="md:hidden hidden" id="mobile-menu">
      {{-- <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
          <a href="#about" class="text-gray-300 hover:bg-green-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Tentang Kami</a>
          <a href="#donation" class="text-gray-300 hover:bg-green-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Donasi Terkumpul</a>
          <a href="#contributors" class="text-gray-300 hover:bg-green-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Organisasi Kontributor</a>
      </div> --}}
      <div class="px-2 pt-4 pb-3 border-t border-green-700">
        @if (Auth::user())
            <a href="/dashboard" class="bg-blue-600 hover:bg-blue-700 text-white block px-4 py-2 rounded-md text-base font-medium">Masuk Dashboard</a>
            <a href="/donate" class="bg-yellow-500 hover:bg-yellow-700 text-white block px-4 py-2 rounded-md text-base font-medium">Donasi Sekarang</a>
        @else
        <a href="/login" class="bg-blue-600 hover:bg-blue-700 text-white block px-4 py-2 rounded-md text-base font-medium">Login</a>
            <a href="/donate" class="bg-yellow-500 hover:bg-yellow-700 text-white block px-4 py-2 rounded-md text-base font-medium">Donasi Sekarang</a>
        @endif
      </div>
  </div>
</nav>


    @yield('content')

    <!-- Footer -->
    <footer class="py-4 bg-green-800 text-white text-center">
        <p>© 2024 SAMARA. All rights reserved.</p>
    </footer>

    <!-- Script Grafik Donasi -->
    <script>
      const ctx = document.getElementById('donationChart').getContext('2d');
      const donationChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
              labels: ['Makanan', 'Uang'],
              datasets: [{
                  label: 'Total Donasi',
                  data: [15000000, 25000000],
                  backgroundColor: ['#4caf50', '#ffeb3b'],
                  borderColor: '#fff',
                  borderWidth: 2
              }]
          },
          options: {
              responsive: true,
              plugins: {
                  legend: {
                      position: 'top',
                      labels: {
                          color: '#ffffff' // Mengubah warna label "Makanan" dan "Uang" menjadi putih
                      }
                  },
                  title: {
                      display: true,
                      text: 'Distribusi Donasi',
                      color: '#ffffff'  // Mengubah warna teks judul menjadi putih
                  }
              }
          }
      });
  </script>
  <script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

</body>
</html>

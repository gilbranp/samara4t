<header class="bg-green-600 text-white p-4 shadow-lg flex justify-between items-center">
    <!-- Logo dan Tombol Sidebar -->
    <div class="flex items-center">
        <h1 class="text-2xl font-bold ml-4">SAMARA</h1>
        <button id="toggleSidebar" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
            <i class="bi bi-list"></i>
        </button>
    </div>

    <!-- Dropdown Admin -->
    <div class="relative">
        <button id="adminDropdownButton" class="flex items-center text-gray-200 hover:text-white focus:outline-none transition duration-300">
            <span class="mr-2">{{ Auth::user()->name }}</span>
            <i class="bi bi-person-circle transition-transform duration-300 transform"></i>
        </button>
        
        <!-- Dropdown Menu dengan icon dan animasi -->
        <div id="adminDropdownMenu" class="absolute right-0 z-10 mt-2 w-56 bg-white rounded-lg shadow-xl opacity-0 transform scale-95 transition-all duration-300 ease-in-out pointer-events-none">
            <!-- Profile Item dengan Icon -->
            <a href="#" class="flex items-center px-4 py-3 text-gray-800 hover:bg-gray-100 transition duration-200 rounded-t-lg">
                <i class="bi bi-person mr-3"></i> <!-- Icon Profile -->
                <span>Profile</span>
            </a>
            <!-- Logout Item dengan Icon -->
            <a href="/logout" class="flex items-center px-4 py-3 text-gray-800 hover:bg-gray-100 transition duration-200 rounded-b-lg">
                <i class="bi bi-box-arrow-right mr-3"></i> <!-- Icon Logout -->
                <span>Logout</span>
            </a>
        </div>
    </div>
</header>

<!-- Script untuk toggle dropdown -->
<script>
    // Ambil elemen dropdown yang terkait dengan ID unik
    const adminDropdownButton = document.getElementById('adminDropdownButton');
    const adminDropdownMenu = document.getElementById('adminDropdownMenu');
    const icon = adminDropdownButton.querySelector('i');

    adminDropdownButton.addEventListener('click', function() {
        // Toggle dropdown menu dan icon
        adminDropdownMenu.classList.toggle('opacity-0');
        adminDropdownMenu.classList.toggle('scale-95');
        adminDropdownMenu.classList.toggle('pointer-events-none');
        
        // Animasi rotasi icon saat membuka dropdown
        icon.classList.toggle('rotate-180');
    });

    // Menutup dropdown ketika klik di luar area dropdown
    document.addEventListener('click', function(event) {
        if (!adminDropdownButton.contains(event.target) && !adminDropdownMenu.contains(event.target)) {
            adminDropdownMenu.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            icon.classList.remove('rotate-180'); // Reset icon rotation saat dropdown ditutup
        }
    });
</script>

<!-- Style tambahan untuk animasi rotasi icon -->
<style>
    .rotate-180 {
        transform: rotate(180deg);
    }
</style>

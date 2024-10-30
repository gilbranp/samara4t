<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        .sidebar {
            transition: transform 0.3s ease;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
            width: 0; /* Memastikan sidebar tidak mengambil ruang saat tersembunyi */
        }

        .main-content {
            transition: margin-left 0.3s ease;
            width: 100%;
        }

        .main-content.sidebar-closed {
            margin-left: 0; /* Lebar konten penuh saat sidebar ditutup */
        }

        .sidebar-open {
            width: 256px; /* Lebar sidebar ketika terbuka */
        }

        .sidebar-hidden {
            width: 0; /* Lebar sidebar ketika tertutup */
        }

        /* Menyembunyikan teks saat sidebar tertutup */
        .sidebar-content {
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        .sidebar.hidden .sidebar-content {
            opacity: 0; /* Menyembunyikan teks saat sidebar ditutup */
        }
    </style>
</head>
<body class="bg-gray-100">
    
    <div class="flex flex-col h-screen">
        <!-- Header -->
        @include('backend.layout.header')
    
        <div class="flex flex-1">
            <!-- Sidebar -->
           @include('backend.layout.sidebar')
    
            <!-- Konten Utama -->
            @yield('content')
        </div>
    
        <!-- Footer -->
        <footer class="bg-green-600 text-white p-4 mt-auto">
            <div class="text-center">
                <p>&copy; 2024 SAMARA. All rights reserved.</p>
                <p>Designed with ❤️ by Team SAMARA</p>
            </div>
        </footer>
    </div>

    <script>
        const toggleSidebarButton = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');

        toggleSidebarButton.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
            mainContent.classList.toggle('sidebar-closed'); // Menyesuaikan konten utama saat sidebar ditutup
        });

        // Close dropdown menu if clicked outside
        const dropdownButton = document.querySelector('button.flex.items-center');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>

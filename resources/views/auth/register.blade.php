<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Registrasi - Samara</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function toggleHousePhotoInput() {
            const levelSelect = document.getElementById("level");
            const housePhotoInput = document.getElementById("housePhotoInput");

            // Tampilkan input foto rumah jika level 'Penerima' dipilih
            if (levelSelect.value === "Penerima") {
                housePhotoInput.classList.remove("hidden");
            } else {
                housePhotoInput.classList.add("hidden");
            }
        }
    </script>
</head>

<body class="bg-gray-100">
    <main>
        <div class="min-h-screen flex items-center justify-center bg-green-600 py-4">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md lg:max-w-2xl xl:max-w-3xl">
                <h2 class="text-2xl font-bold text-center text-green-700 mb-4">REGISTRASI SAMARA</h2>

                <!-- Alert untuk notifikasi kesalahan -->
                @if ($errors->any())
                    <div class="mb-3 p-3 text-red-700 bg-red-100 rounded-lg" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Registrasi -->
                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" id="registrationForm">
                    @csrf

                    <div class="mb-3">
                        <label for="level" class="block text-green-700 font-semibold mb-1">Anda adalah seorang</label>
                        <select id="level" name="level" class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required onchange="toggleHousePhotoInput()">
                            <option value="">Pilih peran anda</option>
                            <option value="Pendonasi">Pendonasi</option>
                            <option value="Penerima">Penerima</option>
                        </select>
                    </div>

                    <!-- Input Foto Rumah (Hidden by default) -->
                    <div id="housePhotoInput" class="mb-3 hidden">
                        <label for="housePhoto" class="block text-green-700 font-semibold mb-1">Upload Foto Rumah</label>
                        <input type="file" id="housePhoto" name="house_photo" accept="image/*" class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        <p class="text-xs text-gray-500">Unggah foto rumah dari depan.  (max 2mb)</p>
                    </div>

                    <!-- Input File Foto Selfie -->
                    <div class="mb-3">
                        <label for="selfie" class="block text-green-700 font-semibold mb-1">Upload Foto Selfie</label>
                        <input type="file" id="selfie" name="selfie" accept="image/*" class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                        <p class="text-xs text-gray-500">Unggah foto selfie untuk keperluan identifikasi.  (max 2mb)</p>
                    </div>

                    <!-- Input Lainnya -->
                    <div class="mb-3">
                        <label for="name" class="block text-green-700 font-semibold mb-1">Nama</label>
                        <input type="text" id="name" name="name" class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="block text-green-700 font-semibold mb-1">Username</label>
                        <input type="text" id="username" name="username" class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan username" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="block text-green-700 font-semibold mb-1">Alamat</label>
                        <textarea id="address" name="address" class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" rows="2" placeholder="Masukkan alamat lengkap" required></textarea>
                    </div>

                    {{-- <div class="mb-3">
                        <label for="organitation" class="block text-green-700 font-semibold mb-1">Organisasi (Opsional)</label>
                        <input type="text" id="organitation" name="organitation" class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan nama organisasi (Opsional)">
                    </div> --}}

                    <div class="mb-3">
                        <label for="phone" class="block text-green-700 font-semibold mb-1">Nomor Telepon</label>
                        <input type="number" id="phone" name="phone" class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan nomor telepon" required>
                    </div>

                    {{-- <div class="mb-3">
                        <label for="job" class="block text-green-700 font-semibold mb-1">Pekerjaan</label>
                        <input type="text" id="job" name="job" class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan pekerjaan Anda" required>
                    </div> --}}

                    <div class="mb-3">
                        <label for="password" class="block text-green-700 font-semibold mb-1">Password</label>
                        <input minlength="8" type="password" id="password" name="password" class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan password" required>
                    </div>

                    <!-- Tombol Registrasi -->
                    <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 rounded-lg font-semibold transition duration-300 shadow-lg">
                        Daftar
                    </button>
                </form>

                <!-- Link Login -->
                <div class="mt-4 text-center">
                    <a href="/login" class="text-yellow-500 hover:underline">Sudah punya akun? Login sekarang</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

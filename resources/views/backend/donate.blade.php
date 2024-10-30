@extends('backend.layout.main')
@section('content')

<!-- Halaman Donasi -->
<section id="donate" class=" text-black mb-10">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center mb-8">Donasi Sekarang</h2>
        <p class="text-lg md:text-xl text-center mb-12">
            Mari bersama membantu mereka yang membutuhkan. Setiap kontribusi sangat berarti untuk mewujudkan dunia tanpa kelaparan.
        </p>

        <div class="bg-white text-gray-800 p-8 rounded-lg shadow-2xl max-w-lg mx-auto">
            <form id="donationForm" action="/donate" method="POST">
                @csrf
                <!-- Nama Lengkap -->
                <div class="mb-6">
                    <label for="name" class="block text-lg font-semibold mb-2">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-6">
                    <label for="email" class="block text-lg font-semibold mb-2">Nomor Telepon</label>
                    <input type="number" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>

                <!-- Pilihan Donasi -->
                <div class="mb-6">
                    <label for="donation_type" class="block text-lg font-semibold mb-2">Jenis Donasi</label>
                    <select id="donation_type" name="donation_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        <option value="">Pilih jenis donasi</option>
                        <option value="uang">Uang</option>
                        <option value="makanan">Makanan</option>
                    </select>
                </div>

                <!-- Input untuk jumlah donasi uang -->
                <div id="amount_input" class="mb-6 hidden">
                    <label for="amount" class="block text-lg font-semibold mb-2">Jumlah Donasi (IDR)</label>
                    <input type="number" id="amount" name="amount" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Input untuk jenis makanan dan perkiraan kadaluarsa -->
                <div id="food_input" class="hidden">
                    <div class="mb-6">
                        <label for="food_name" class="block text-lg font-semibold mb-2">Jenis Makanan</label>
                        <input type="text" id="food_name" name="food_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div class="mb-6">
                        <label for="expired_date" class="block text-lg font-semibold mb-2">Perkiraan Kadaluarsa</label>
                        <input type="date" id="expired_date" name="expired_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                </div>

                <!-- Pesan (Opsional) -->
                <div class="mb-6">
                    <label for="message" class="block text-lg font-semibold mb-2">Pesan (Opsional)</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                </div>

                <!-- Tombol Donasi -->
                <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition duration-300">Donasi Sekarang</button>
            </form>
        </div>
    </div>
</section>

<!-- Notifikasi menggunakan modal -->
<div id="loginModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <p class="text-lg text-gray-800 mb-4">Anda harus login terlebih dahulu untuk melakukan donasi.</p>
        <div class="flex justify-end">
            <button id="loginBtn" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">Login</button>
            <button id="closeModal" class="ml-4 bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700">Tutup</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        let isAuthenticated = @json(Auth::check());

        const form = document.getElementById('donationForm');
        const modal = document.getElementById('loginModal');
        const loginBtn = document.getElementById('loginBtn');
        const closeModal = document.getElementById('closeModal');

        form.addEventListener('submit', function(event) {
            if (!isAuthenticated) {
                event.preventDefault();
                modal.classList.remove('hidden');
            }
        });

        loginBtn.addEventListener('click', function() {
            window.location.href = '/login';
        });

        closeModal.addEventListener('click', function() {
            modal.classList.add('hidden');
        });

        const donationTypeSelect = document.getElementById('donation_type');
        const amountInput = document.getElementById('amount_input');
        const foodInput = document.getElementById('food_input');

        donationTypeSelect.addEventListener('change', function() {
            const selectedValue = this.value;

            if (selectedValue === 'uang') {
                amountInput.classList.remove('hidden');
                foodInput.classList.add('hidden');
            } else if (selectedValue === 'makanan') {
                foodInput.classList.remove('hidden');
                amountInput.classList.add('hidden');
            } else {
                amountInput.classList.add('hidden');
                foodInput.classList.add('hidden');
            }
        });
    });
</script>

@endsection
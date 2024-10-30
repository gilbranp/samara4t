@extends('frontend.layout.main')
@section('content')


<!-- Modal untuk Login -->
@if(!Auth::check())
<div id="loginModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg p-6 max-w-lg mx-auto text-center shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Harap Login Terlebih Dahulu</h2>
        <p class="mb-6">Anda harus login untuk melakukan donasi. Silakan login atau buat akun jika belum memiliki.</p>
        <a href="{{ route('login') }}" class="bg-green-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-700 transition duration-300">Login</a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loginModal = document.getElementById('loginModal');
    loginModal.style.display = 'block';
});
</script>
@endif
<!-- Halaman Donasi -->
<section id="donate" class="py-12 bg-green-600 text-white">
    <div class="container mx-auto px-6 lg:px-12 xl:px-24">
        <h2 class="text-3xl font-bold text-center mb-6">Donasi Sekarang</h2>
        <p class="text-lg md:text-xl text-center mb-10">Mari bersama membantu mereka yang membutuhkan. Setiap kontribusi sangat berarti untuk mewujudkan dunia tanpa kelaparan.</p>

        <div class="bg-white text-gray-800 p-6 rounded-lg shadow-2xl max-w-2xl mx-auto">
            <form id="donationForm" action="{{ route('donate.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-4" role="alert">
                        <p class="font-bold">Berhasil!</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                    <strong class="font-bold">Terjadi kesalahan!</strong> 
                    <span class="block sm:inline">Silakan perbaiki kesalahan berikut:</span>
                    <ul class="list-disc pl-5 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            


                <!-- Grid Form -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

                    <!-- Nama Lengkap -->
                    <div>
                        <label for="name" class="block text-lg font-semibold mb-1">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <label for="phone" class="block text-lg font-semibold mb-1">Nomor Telepon</label>
                        <input type="number" id="phone" name="phone" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>

                    <!-- Alamat -->
                    <div class="lg:col-span-2">
                        <label for="address" class="block text-lg font-semibold mb-1">Alamat</label>
                        <textarea id="address" name="address" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required></textarea>
                    </div>

                    <!-- Jenis Donasi -->
                    <div>
                        <label for="donation_type" class="block text-lg font-semibold mb-1">Jenis Donasi</label>
                        <select id="donation_type" name="donation_type" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                            <option value="">Pilih jenis donasi</option>
                            <option value="uang">Uang</option>
                            <option value="alat pertanian">Alat Pertanian</option> 
                            <option value="pupuk kimia">Pupuk Kimia</option> 
                            <option value="pupuk organik">Pupuk Organik</option> 
                            <option value="beras">Beras/kg</option> 
                            <option value="sagu">Sagu</option> 
                            <option value="jagung">Jagung/kg</option> 
                            {{-- <option value="lainnya">Lainnya</option>  --}}
                        </select>
                    </div>

                    <!-- Jumlah Donasi Uang -->
                    <div id="amount_input" class="hidden">
                        <label for="amount" class="block text-lg font-semibold mb-1">Jumlah Donasi (IDR)</label>
                        <input type="number" id="amount" name="amount" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <!-- Input Donasi Barang -->
                    <div id="item_input" class="hidden lg:col-span-2 grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <div>
                            <label for="item_qty" class="block text-lg font-semibold mb-1">Jumlah</label>
                            <input type="number" id="item_qty" name="item_qty" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label for="expired_date" class="block text-lg font-semibold mb-1">Perkiraan Kadaluarsa (Opsional)</label>
                            <input type="date" id="expired_date" name="expired_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label for="donation_option" class="block text-lg font-semibold mb-1">Pilih Opsi Donasi</label>
                            <select id="donation_option" name="donation_option" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">Pilih opsi</option>
                                <option value="Dikirim">Dikirim</option>
                                <option value="Dijemput">Dijemput</option>
                            </select>
                        </div>
                        <div id="resi_input" class="hidden">
                            <label for="resi_number" class="block text-lg font-semibold mb-1">Nomor Resi</label>
                            <input type="text" id="resi_number" name="resi_number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div id="distribusi_input" class="hidden">
                            <label for="jasa_distribusi" class="block text-lg font-semibold mb-1">Jasa Distribusi</label>
                            <select id="jasa_distribusi" name="jasa_distribusi" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">Pilih jasa distribusi</option>
                                <option value="JNE">JNE</option>
                                <option value="TIKI">TIKI</option>
                                <option value="POS">POS</option>
                                <option value="Grab">Grab</option>
                                <option value="Gojek">Gojek</option>
                            </select>
                        </div>
                    </div>
                </div>

               <!-- Pilihan Metode Pembayaran -->
                <div id="payment_option_input" class="hidden">
                    <label for="payment_option" class="block text-lg font-semibold mb-1">Metode Pembayaran</label>
                    <select id="payment_option" name="payment_option" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="">Pilih metode pembayaran</option>
                        <option value="manual">Manual</option>
                        <option value="otomatis">Otomatis</option>
                    </select>
                </div>

                <!-- Informasi Transfer Manual -->
                <div id="manual_transfer_info" class="hidden mt-4">
                    <p class="text-lg font-semibold mb-1">Nomor Rekening/E-Wallet:</p>
                    <p class="text-gray-700">Bank Mandiri - 1800013687605 (a.n. Samara) atau E-Wallet Dana - 081268477296</p>
                    
                    <label for="transfer_receipt" class="block text-lg font-semibold mt-3 mb-1">
                        Unggah Bukti Transfer
                    </label>
                    <input type="file" id="transfer_receipt" name="transfer_receipt" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" aria-describedby="transferReceiptHelp">
                    <small id="transferReceiptHelp" class="text-gray-500">Hanya menerima file gambar (JPEG, PNG, JPG, GIF).</small>
                    
                </div>
                <!-- Pesan -->
                <div class="mb-4">
                    <label for="message" class="block text-lg font-semibold mb-1">Pesan (Opsional)</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                </div>


                <!-- Tombol Submit -->
                <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 rounded-lg hover:bg-green-700 transition duration-300">Donasi Sekarang</button>
            </form>
        </div>
    </div>
</section>


<!-- Tambahkan pilihan manual atau otomatis untuk jenis donasi uang -->


<script>
document.addEventListener('DOMContentLoaded', function() {

    const donationTypeSelect = document.getElementById('donation_type');
    const donationOptionSelect = document.getElementById('donation_option');
    const amountInput = document.getElementById('amount_input');
    const itemInput = document.getElementById('item_input');
    const resiInput = document.getElementById('resi_input');
    const distribusiInput = document.getElementById('distribusi_input');
    const paymentOptionInput = document.getElementById('payment_option'); // Mengambil elemen select dari metode pembayaran
    const paymentOptionContainer = document.getElementById('payment_option_input'); // Container untuk pilihan metode pembayaran
    const manualTransferInfo = document.getElementById('manual_transfer_info'); // Info transfer manual

    donationTypeSelect.addEventListener('change', function() {
        if (this.value === 'uang') {
            amountInput.classList.remove('hidden');
            paymentOptionContainer.classList.remove('hidden'); // Menampilkan container metode pembayaran
            itemInput.classList.add('hidden');
        } else {
            itemInput.classList.remove('hidden');
            amountInput.classList.add('hidden');
            paymentOptionContainer.classList.add('hidden'); // Menyembunyikan container metode pembayaran
            manualTransferInfo.classList.add('hidden'); // Menyembunyikan info transfer manual
        }
    });

    paymentOptionInput.addEventListener('change', function() {
        if (this.value === 'manual') {
            manualTransferInfo.classList.remove('hidden'); // Tampilkan info transfer manual
        } else {
            manualTransferInfo.classList.add('hidden'); // Sembunyikan info transfer manual
        }
    });

    donationOptionSelect.addEventListener('change', function() {
        if (this.value === 'Dikirim') {
            resiInput.classList.remove('hidden');
            distribusiInput.classList.add('hidden');
        } else if (this.value === 'Dijemput') {
            distribusiInput.classList.remove('hidden');
            resiInput.classList.add('hidden');
        } else {
            resiInput.classList.add('hidden');
            distribusiInput.classList.add('hidden');
        }
    });
});

</script>

@endsection

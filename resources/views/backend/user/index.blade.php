@extends('backend.layout.main')
@section('content')

<!-- Konten Utama -->
<main id="mainContent" class="main-content flex-1 p-6 overflow-y-auto transition-all duration-300">
    <h1 class="text-3xl lg:text-4xl font-semibold text-green-700 mb-4 lg:mb-0 text-center lg:text-left">Manajemen Pengguna</h1>

    <!-- Tabel Pengguna -->
    <div class="bg-white p-4 rounded-lg shadow-lg overflow-x-auto mt-5">
        <h3 class="text-xl font-bold mb-4">Daftar Pengguna</h3>
        <table class="min-w-full bg-white border border-gray-300">
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">#</th>
                    <th class="py-2 px-4 border">Nama Pengguna</th>
                    <th class="py-2 px-4 border">Username</th>
                    <th class="py-2 px-4 border">Level</th>
                    <th class="py-2 px-4 border">Status</th>
                    <th class="py-2 px-4 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border">{{ $user->name }}</td>
                    <td class="py-2 px-4 border">{{ $user->username }}</td>
                    <td class="py-2 px-4 border">{{ $user->level }}</td>
                    <td class="py-2 px-4 border">
                        <span class="px-3 py-1 rounded-full text-xs lg:text-sm 
                            {{ $user->is_active ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                            {{ $user->is_active ? 'On' : 'Off' }}
                        </span>
                    </td>
                    
                    <td class="py-2 px-4 border flex space-x-2">
                        <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-200 text-center" onclick="openModal('approve', {{ $user->id }})">
                            <i class="bi bi-check-circle"></i> ACC
                        </button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-200 text-center" onclick="openModal('reject', {{ $user->id }})">
                            <i class="bi bi-x-circle"></i> Tolak
                        </button>
                        <a href="{{ route('manageuser.show',$user->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200 text-center">
                            <i class="bi bi-eye"></i> Lihat Detail
                        </a>
                    </td>
                </tr>
                @endforeach
                <!-- Tambahkan baris data lainnya di sini -->
            </tbody>
        </table>
    </div>

    <!-- Modal Konfirmasi -->
    <div id="confirmationModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/3">
            <h2 class="text-lg font-bold mb-4" id="modalTitle"></h2>
            <p id="modalMessage"></p>
            <div class="flex justify-end mt-4">
                <button class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg mr-2" onclick="closeModal()">Batal</button>
                <button id="confirmButton" class="bg-green-500 text-white px-4 py-2 rounded-lg">Ya, Lanjutkan</button>
            </div>
        </div>
    </div>
</main>

<script>
    let action = '';
    let userId = '';

    function openModal(type, id) {
        action = type;
        userId = id;

        const title = type === 'approve' ? 'Konfirmasi ACC' : 'Konfirmasi Tolak';
        const message = type === 'approve' 
            ? 'Anda yakin ingin menyetujui pengguna ini?' 
            : 'Anda yakin ingin menolak pengguna ini?';

        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalMessage').innerText = message;
        document.getElementById('confirmationModal').classList.remove('hidden');

        document.getElementById('confirmButton').onclick = function() {
            if (type === 'approve') {
                approveUser(userId);
            } else {
                rejectUser(userId);
            }
            closeModal();
        };
    }

    function closeModal() {
        document.getElementById('confirmationModal').classList.add('hidden');
    }

    function approveUser(userId) {
        // Membuat form secara dinamis untuk ACC
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/users/${userId}/approve`; // Ganti dengan rute ACC yang sesuai
        form.innerHTML = `
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        `;
        document.body.appendChild(form);
        form.submit();
    }

    function rejectUser(userId) {
        // Membuat form secara dinamis untuk menghapus pengguna
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/users/${userId}`; // Ganti dengan rute hapus pengguna yang sesuai
        form.innerHTML = `
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
        `;
        document.body.appendChild(form);
        form.submit();
    }
</script>

@endsection

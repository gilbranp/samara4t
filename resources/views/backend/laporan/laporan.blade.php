@extends('backend.layout.main')

@section('content')
<section class="main-content flex-1 p-6 overflow-y-auto transition-all duration-300">
    <div class="container mx-auto p-4">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-3xl font-bold mb-4 text-center text-blue-600">Laporan Donasi yang Disalurkan</h2>

            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Filter Laporan</h3>
                <form action="#" method="GET" class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <select name="kategori" class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua Kategori</option>
                        <option value="Uang">Uang</option>
                        <option value="Barang">Barang</option>
                    </select>

                    <input type="date" name="start_date" class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Tanggal Mulai">
                    <input type="date" name="end_date" class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Tanggal Selesai">

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                        Filter
                    </button>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-2 px-4 border-b text-left">No</th>
                            <th class="py-2 px-4 border-b text-left">ID Donasi</th>
                            <th class="py-2 px-4 border-b text-left">Nama Donatur</th>
                            <th class="py-2 px-4 border-b text-left">Jumlah Donasi</th>
                            <th class="py-2 px-4 border-b text-left">Jenis Donasi</th>
                            <th class="py-2 px-4 border-b text-left">Penerima</th>
                            <th class="py-2 px-4 border-b text-left">Tanggal Salur</th>
                            <th class="py-2 px-4 border-b text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data Statis -->
                        <tr>
                            <td class="py-2 px-4 border-b">1</td>
                            <td class="py-2 px-4 border-b">001</td>
                            <td class="py-2 px-4 border-b">Donatur A</td>
                            <td class="py-2 px-4 border-b">Rp 1.000.000</td>
                            <td class="py-2 px-4 border-b">Uang</td>
                            <td class="py-2 px-4 border-b">Penerima A</td>
                            <td class="py-2 px-4 border-b">2024-10-12</td>
                            <td class="py-2 px-4 border-b"><span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Disalurkan</span></td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">2</td>
                            <td class="py-2 px-4 border-b">002</td>
                            <td class="py-2 px-4 border-b">Donatur B</td>
                            <td class="py-2 px-4 border-b">Rp 500.000</td>
                            <td class="py-2 px-4 border-b">Barang</td>
                            <td class="py-2 px-4 border-b">Penerima B</td>
                            <td class="py-2 px-4 border-b">2024-10-10</td>
                            <td class="py-2 px-4 border-b"><span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Disalurkan</span></td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">003</td>
                            <td class="py-2 px-4 border-b">Donatur C</td>
                            <td class="py-2 px-4 border-b">Rp 1.500.000</td>
                            <td class="py-2 px-4 border-b">Uang</td>
                            <td class="py-2 px-4 border-b">Penerima C</td>
                            <td class="py-2 px-4 border-b">2024-10-09</td>
                            <td class="py-2 px-4 border-b"><span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Disalurkan</span></td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">4</td>
                            <td class="py-2 px-4 border-b">004</td>
                            <td class="py-2 px-4 border-b">Donatur D</td>
                            <td class="py-2 px-4 border-b">Rp 750.000</td>
                            <td class="py-2 px-4 border-b">Uang</td>
                            <td class="py-2 px-4 border-b">Penerima D</td>
                            <td class="py-2 px-4 border-b">2024-10-08</td>
                            <td class="py-2 px-4 border-b"><span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Disalurkan</span></td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">5</td>
                            <td class="py-2 px-4 border-b">005</td>
                            <td class="py-2 px-4 border-b">Donatur E</td>
                            <td class="py-2 px-4 border-b">Rp 1.200.000</td>
                            <td class="py-2 px-4 border-b">Barang</td>
                            <td class="py-2 px-4 border-b">Penerima E</td>
                            <td class="py-2 px-4 border-b">2024-10-05</td>
                            <td class="py-2 px-4 border-b"><span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Disalurkan</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

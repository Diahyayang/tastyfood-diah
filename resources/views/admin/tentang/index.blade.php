<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Tentang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

@include('admin.layouts.navbar')
<!-- MAIN -->
<div class="flex-1 p-6 md:p-8 md:ml-[20px] transition-all duration-300">

    <div class="max-w-6xl mx-auto">

        <h1 class="text-2xl font-bold mb-6">Data Tentang</h1>

        <a href="{{ route('admin.tentang.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-semibold transition shadow">
            + Tambah Data
        </a>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">

                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="px-6 py-4">No</th>
                            <th class="px-6 py-4">Section</th>
                            <th class="px-6 py-4">Deskripsi</th>
                            <th class="px-6 py-4">Gambar</th>
                            <th class="px-6 py-4">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @forelse ($tentangs as $index => $tentang)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-700">
                                {{ $tentang->section }}
                            </td>

                            <td class="px-6 py-4 text-gray-600 max-w-xs truncate">
                                {{ \Illuminate\Support\Str::limit($tentang->deskripsi, 80) }}
                            </td>

                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $tentang->gambar) }}"
                                     class="w-16 h-16 object-cover rounded-lg">
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">

                                    <a href="{{ route('admin.tentang.edit', $tentang->id) }}"
                                       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-xs transition">
                                       ✏️ Edit
                                    </a>

                                    <form action="{{ route('admin.tentang.destroy', $tentang->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button 
                                            onclick="return confirm('Hapus data ini?')" 
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-xs transition">
                                            🗑️ Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="5" class="text-center px-6 py-6 text-gray-500">
                                Data belum tersedia
                            </td>
                        </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>

    </div>

</div>

<script>
function toggleMenu(){

const menu = document.getElementById("mobileMenu");
const overlay = document.getElementById("overlay");

menu.classList.toggle("-translate-x-full");
overlay.classList.toggle("hidden");

}
</script>

</body>
</html>
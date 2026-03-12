<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Berita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

@include('admin.layouts.navbar')

<!-- MAIN -->
<div class="flex-1 p-6 md:pt-8 md:p-8 md:ml-[20px] transition-all duration-300">

    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 gap-4">
            <h1 class="text-2xl font-bold">Data Berita</h1>

            <a href="{{ route('berita.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-semibold transition shadow">
                ➕ Tambah Berita
            </a>
        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left">

                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="px-6 py-4">Gambar</th>
                            <th class="px-6 py-4">Judul</th>
                            <th class="px-6 py-4">Isi</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @forelse ($beritas as $berita)
                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-4">
 
                                @if ($berita->gambar)
                                    <img src="{{ asset('storage/'.$berita->gambar) }}"
                                         class="w-20 h-14 object-cover rounded-lg">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                                
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-800">
                                {{ $berita->judul }}
                            </td>

                            <td class="px-6 py-4 text-gray-500 max-w-xs truncate">
                                {{ \Illuminate\Support\Str::limit($berita->isi, 100) }}
                            </td>

                            <td class="px-6 py-4 ">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('berita.edit', $berita->id) }}"
                                   class="inline-block bg-green-400 hover:bg-green-500 text-white px-3 py-1 rounded-lg text-xs transition">
                                    ✏️ Edit
                                </a>

                                <form action="{{ route('berita.destroy', $berita->id) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs transition">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center px-6 py-6 text-gray-500">
                                Belum ada data berita
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
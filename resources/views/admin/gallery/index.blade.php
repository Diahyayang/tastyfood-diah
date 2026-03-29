<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Gallery Admin</title>
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
            <h1 class="text-2xl font-bold">🖼️ Data Gallery</h1>

            <a href="{{ route('admin.gallery.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-semibold transition shadow">
                ➕ Tambah Foto
            </a>
        </div>

        @if($galleries->count() === 0)
            <p class="text-gray-500">Belum ada data gallery.</p>
        @endif

        <!-- GRID GALLERY -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

            @foreach($galleries as $g)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden flex flex-col">

                <img src="{{ asset('storage/'.$g->gambar) }}"
                     class="w-full h-40 object-cover">

                <div class="p-4 flex flex-col flex-1">

                    <h3 class="font-semibold text-gray-800 mb-1">
                        {{ $g->judul }}
                    </h3>

                    <p class="text-sm text-gray-500 mb-4 flex-1 line-clamp-3">
                        {{ $g->description }}
                    </p>

                    <div class="flex gap-2">
                        <a href="{{ route('admin.gallery.edit', $g->id) }}"
                           class="flex-1 text-center bg-green-500 hover:bg-green-600 text-white text-xs py-2 rounded-full transition">
                            ✏️ Edit
                        </a>

                        <form action="{{ route('admin.gallery.destroy', $g->id) }}"
                              method="POST"
                              class="flex-1"
                              onsubmit="return confirm('Hapus data?')">
                            @csrf
                            @method('DELETE')
                            <button class="w-full bg-red-500 hover:bg-red-600 text-white text-xs py-2 rounded-full transition">
                                🗑️ Hapus
                            </button>
                        </form>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

    </div>
    <div class="mt-8 flex justify-center">
    {{ $galleries->links() }}
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
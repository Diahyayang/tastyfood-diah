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
<div class="flex-1 p-6 md:p-8 transition-all duration-300">

    <div class="max-w-5xl mx-auto">

        <!-- HEADER -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
            <h1 class="text-2xl font-bold text-gray-800">
                📑 Data Tentang
            </h1>

            <a href="{{ route('admin.tentang.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-semibold transition shadow">
                ➕ Tambah Data
            </a>
        </div>

        <!-- ALERT -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- LIST CARD -->
        <div class="space-y-5">

            @forelse ($tentangs as $index => $tentang)
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition p-5 border-l-4 border-blue-900">

                <div class="flex flex-col sm:flex-row gap-4">

                    <!-- Gambar -->
                    <div class="w-full sm:w-32 flex-shrink-0">
                        @if ($tentang->gambar)
                            <img src="{{ asset('storage/' . $tentang->gambar) }}"
                                 class="w-full h-28 object-cover rounded-xl">
                        @else
                            <div class="w-full h-28 bg-gray-200 rounded-xl flex items-center justify-center text-gray-400 text-sm">
                                Tidak ada gambar
                            </div>
                        @endif
                    </div>

                    <!-- Konten -->
                    <div class="flex-1 flex flex-col justify-between">

                        <!-- Section + Nomor -->
                        <h2 class="text-lg font-semibold text-blue-900 mb-1">
                            {{ $index + 1 }}. {{ $tentang->section }}
                        </h2>

                        <!-- Deskripsi -->
                        <p class="text-gray-600 text-sm mb-3">
                            {{ \Illuminate\Support\Str::limit($tentang->deskripsi, 120) }}
                        </p>

                        <!-- Aksi -->
                        <div class="flex gap-3 mt-auto">
                            <a href="{{ route('admin.tentang.edit', $tentang->id) }}"
                               class="text-green-600 hover:text-green-800 text-sm font-medium">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('admin.tentang.destroy', $tentang->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-red-500 hover:text-red-700 text-sm font-medium">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>

                    </div>

                </div>

            </div>

            @empty
            <div class="text-center text-gray-500 py-10 bg-white rounded-2xl shadow-sm">
                Data belum tersedia
            </div>
            @endforelse

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
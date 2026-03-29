<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Kontak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

@include('admin.layouts.navbar')

<!-- MAIN -->
<div class="flex-1 p-6 md:p-8 transition-all duration-300">

    <div class="max-w-5xl mx-auto">

        <!-- Title -->
        <h1 class="text-2xl font-bold mb-6 text-gray-800">
            📩 Pesan Masuk
        </h1>

        <!-- Alert -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Container -->
        <div class="space-y-5">

            @forelse($contacts as $item)
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition p-5 border-l-4 border-blue-900">

                <!-- Header -->
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h2 class="text-lg font-semibold text-blue-900">
                            {{ $item->nama }}
                        </h2>
                        <p class="text-sm text-gray-500">
                            {{ $item->email }}
                        </p>
                    </div>

                    <!-- Delete -->
                    <form method="POST" action="{{ url('/admin/kontak/'.$item->id) }}">
                        @csrf
                        @method('DELETE')

                        <button 
                            onclick="return confirm('Hapus pesan ini?')" 
                            class="text-red-500 hover:text-red-700 text-sm font-medium">
                            🗑️ Hapus
                        </button>
                    </form>
                </div>

                <!-- Pesan -->
                <div class="text-gray-700 text-sm leading-relaxed">
                    {{ $item->pesan }}
                </div>

            </div>

            @empty
            <div class="text-center text-gray-500 py-10 bg-white rounded-2xl shadow-sm">
                Belum ada pesan
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
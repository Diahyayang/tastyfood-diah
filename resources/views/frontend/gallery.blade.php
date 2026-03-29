<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-gray-100">

<!-- ================= NAVBAR ================= -->
@include('frontend.layouts.navbar2')
<!-- ================= HERO ================= -->
<section class="relative min-h-[50vh] lg:min-h-[70vh] flex items-center"
    style="background-image:url('{{ asset('storage/images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}'); background-size:cover; background-position:center;">


    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50"></div>


    <!-- Text -->
    <div class="relative max-w-7xl mx-auto px-6 w-full">
        <h1 class="text-white text-3xl sm:text-4xl lg:text-6xl font-bold">
            GALLERY KAMI
        </h1>
    </div>


</section>

<!-- ================= CAROUSEL ================= -->
@if($galleries->count())
<section class="py-20 bg-white"
    x-data="{ active: 0, total: {{ $carousel->count() }} }">

    <div class="max-w-5xl mx-auto px-6 relative">

        <div class="overflow-hidden rounded-3xl shadow-2xl">
            
            <div class="flex transition-transform duration-500 ease-in-out"
                 :style="'transform: translateX(-' + (active * 100) + '%)'">

                @foreach($carousel as $g)
                    <img 
                        src="{{ asset('storage/'.$g->gambar) }}"
                        class="w-full flex-shrink-0 h-[450px] object-cover">
                @endforeach

            </div>

        </div>

        <!-- Prev -->
        <button @click="active = active === 0 ? total-1 : active-1"
            class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/60 text-white p-3 rounded-full">
            ❮
        </button>

        <!-- Next -->
        <button @click="active = active === total-1 ? 0 : active+1"
            class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/60 text-white p-3 rounded-full">
            ❯
        </button>

    </div>
</section>
@endif
<!-- ================= GRID GALLERY ================= -->
<section class="pb-24 bg-white"
    x-data="{ open:false, image:'' }">

<div class="max-w-6xl mx-auto px-6">

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach($galleries as $g)
        <div>
            <img 
                src="{{ asset('storage/'.$g->gambar) }}"
                @click="open=true; image='{{ asset('storage/'.$g->gambar) }}'"
                class="w-full h-60 object-cover rounded-2xl transition hover:scale-105 cursor-pointer">
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="flex flex-col items-center mt-12 space-y-2">
        {{ $galleries->links() }}
        <small class="text-gray-500 text-sm">
            Menampilkan {{ $galleries->firstItem() }} - {{ $galleries->lastItem() }} 
            dari {{ $galleries->total() }} gambar
        </small>
    </div>

</div>

<!-- MODAL -->
<div x-cloak x-show="open" x-transition
    class="fixed inset-0 bg-black/80 flex items-center justify-center z-50">

    <button @click="open=false"
        class="absolute top-6 right-6 text-white text-3xl">
        ✕
    </button>

    <img :src="image"
        class="max-h-[85vh] max-w-[90vw] rounded-2xl shadow-2xl">
</div>

</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-black text-gray-400 pt-24">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-12">


        {{-- BRAND --}}
        <div>
            <h3 class="text-3xl font-bold text-white mb-6">
                Tasty Food
            </h3>


            <p class="text-sm leading-relaxed mb-6">
                Tasty Food menghadirkan makanan sehat dengan cita rasa terbaik.
                Kami percaya hidup sehat dimulai dari pilihan makanan bergizi,
                berkualitas, dan tetap lezat untuk dinikmati setiap hari.
            </p>


            {{-- SOCIAL DESKTOP --}}
            <div class="hidden md:flex gap-4">


                <!-- FACEBOOK -->
                <a href="https://www.facebook.com"
                   target="_blank"
                   class="w-9 h-9 bg-white text-black rounded-full flex items-center justify-center hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M22 12a10 10 0 1 0-11.56 9.87v-6.99H7.9V12h2.54V9.8c0-2.5
                        1.49-3.88 3.77-3.88 1.09 0 2.23.2 2.23.2v2.46h-1.26c-1.24
                        0-1.63.77-1.63 1.56V12h2.77l-.44 2.88h-2.33v6.99A10
                        10 0 0 0 22 12z"/>
                    </svg>
                </a>


                <!-- TWITTER -->
                <a href="https://www.twitter.com"
                   target="_blank"
                   class="w-9 h-9 bg-white text-black rounded-full flex items-center justify-center hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M22.46 6c-.77.35-1.6.58-2.46.69a4.3
                        4.3 0 0 0 1.88-2.37 8.59 8.59 0 0 1-2.72
                        1.04A4.28 4.28 0 0 0 16.11 4c-2.37
                        0-4.29 1.92-4.29 4.29 0 .34.04.67.11.98A12.16
                        12.16 0 0 1 3.15 4.9a4.28 4.28 0 0 0 1.33
                        5.72 4.27 4.27 0 0 1-1.94-.54v.05c0
                        2.09 1.49 3.83 3.46 4.23a4.3 4.3 0 0
                        1-1.93.07 4.3 4.3 0 0 0 4.01
                        2.98A8.6 8.6 0 0 1 2 19.54 12.13
                        12.13 0 0 0 8.29 21c7.55 0 11.68-6.26
                        11.68-11.68l-.01-.53A8.35 8.35 0 0 0
                        22.46 6z"/>
                    </svg>
                </a>


            </div>
        </div>


        {{-- USEFUL LINKS --}}
        <div>
            <h4 class="font-semibold text-white mb-4">Useful Links</h4>
            <ul class="space-y-3 text-sm">
                <li><a href="tentang" class="hover:text-white transition">Tentang Kami</a></li>
                <li><a href="berita" class="hover:text-white transition">Berita</a></li>
                <li><a href="gallery" class="hover:text-white transition">Galeri</a></li>
                 <li><a href="kontak" class="hover:text-white transition">Kontak</a></li>
            </ul>
        </div>


        {{-- PRIVACY --}}
        <div>
            <h4 class="font-semibold text-white mb-4">Privacy</h4>
            <ul class="space-y-3 text-sm">
                <li><a href="#" class="hover:text-white transition">Karir</a></li>
                <li><a href="#" class="hover:text-white transition">Testimoni</a></li>
                <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                <li><a href="#" class="hover:text-white transition">Service</a></li>
            </ul>
        </div>


        {{-- CONTACT --}}
        <div>
            <h4 class="font-semibold text-white mb-4">Contact</h4>
            <ul class="space-y-3 text-sm">
                <li>tastyfood@gmail.com</li>
                <li>+62 812 3456 7890</li>
                <li>Bandung, Jawa Barat</li>
            </ul>
        </div>


    </div>


    {{-- COPYRIGHT --}}
    <div class="mt-20 border-t border-gray-700 text-center text-xs py-6 text-gray-500">
        © 2026 Tasty Food. All Rights Reserved.
    </div>


    {{-- SOCIAL MOBILE --}}
    <div class="flex justify-center gap-4 pb-8 md:hidden">


        <a href="https://www.facebook.com"
           class="w-9 h-9 bg-white text-black rounded-full flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                <path d="M22 12a10 10 0 1 0-11.56 9.87v-6.99H7.9V12h2.54V9.8c0-2.5
                1.49-3.88 3.77-3.88 1.09 0 2.23.2 2.23.2v2.46h-1.26c-1.24
                0-1.63.77-1.63 1.56V12h2.77l-.44 2.88h-2.33v6.99A10
                10 0 0 0 22 12z"/>
            </svg>
        </a>


        <a href="https://www.twitter.com"
           class="w-9 h-9 bg-white text-black rounded-full flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                <path d="M22.46 6c-.77.35-1.6.58-2.46.69a4.3
                4.3 0 0 0 1.88-2.37 8.59 8.59 0 0 1-2.72
                1.04A4.28 4.28 0 0 0 16.11 4c-2.37
                0-4.29 1.92-4.29 4.29 0 .34.04.67.11.98A12.16
                12.16 0 0 1 3.15 4.9a4.28 4.28 0 0 0 1.33
                5.72 4.27 4.27 0 0 1-1.94-.54v.05c0
                2.09 1.49 3.83 3.46 4.23a4.3 4.3 0 0
                1-1.93.07 4.3 4.3 0 0 0 4.01
                2.98A8.6 8.6 0 0 1 2 19.54 12.13
                12.13 0 0 0 8.29 21c7.55 0 11.68-6.26
                11.68-11.68l-.01-.53A8.35 8.35 0 0 0
                22.46 6z"/>
            </svg>
        </a>


    </div>


</footer>



<script src="//unpkg.com/alpinejs" defer></script>

</body>
</html>
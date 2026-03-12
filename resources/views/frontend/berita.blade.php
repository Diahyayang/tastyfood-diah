<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Berita</title>

<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body{font-family:'Poppins',sans-serif;}
</style><style>
[x-cloak]{
display:none;
}
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
            BERITA KAMI
        </h1>
    </div>


</section>

<!-- ================= HEADLINE ================= -->
@if($headline)
<section class="py-20 bg-gray-50">
<div class="max-w-6xl mx-auto px-6">
<div class="grid md:grid-cols-2 gap-10 items-center">

    <img src="{{ asset('storage/'.$headline->gambar) }}"
         class="rounded-3xl w-full h-[450px] object-cover">

    <div
    data-judul="{{ e($headline->judul) }}"
    data-isi="{{ e($headline->isi) }}"
    data-gambar="{{ $headline->gambar }}">

        <h3 class="text-3xl font-bold mb-4">
            {{ $headline->judul }}
        </h3>

        <p class="text-gray-600 mb-6">
            {{ Str::limit(strip_tags($headline->isi),300) }}
        </p>

        <a href="#"
           class="bg-black text-white px-8 py-3 inline-block hover:bg-gray-800 transition content-btn">
           BACA SELENGKAPNYA
        </a>
    </div>

</div>
</div>
</section>
@endif

<!-- ================= BERITA LAINNYA ================= -->
<section class="py-16">
<div class="max-w-6xl mx-auto px-6 -mt-10">

<h2 class="text-3xl font-bold mb-8">
    BERITA LAINNYA
</h2>

<div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2 ">

@foreach($berita as $item)
<div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col"
data-judul="{{ e($item->judul) }}"
data-isi="{{ e($item->isi) }}"
data-gambar="{{ $item->gambar }}">

    <img src="{{ asset('storage/'.$item->gambar) }}"
         class="h-44 w-full object-cover">

    <div class="p-5 flex flex-col flex-1">

        <h3 class="font-bold text-lg line-clamp-2 mb-2">
            {{ $item->judul }}
        </h3>

        <p class="text-sm text-gray-600 line-clamp-3 mb-4 flex-1">
            {{ Str::limit(strip_tags($item->isi),120) }}
        </p>

        <a href="#"
           class="text-amber-500 text-sm hover:underline berita-read-more">
           Baca selengkapnya
        </a>
    </div>
</div>
@endforeach

</div>
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
                <li><a href="#" class="hover:text-white transition">Blog</a></li>
                <li><a href="#" class="hover:text-white transition">Galeri</a></li>
                <li><a href="#" class="hover:text-white transition">Testimonial</a></li>
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

<!-- ================= MODAL (TAILWIND) ================= -->
<div id="beritaModal"
     class="fixed inset-0 bg-black/60 hidden items-center justify-center p-6 z-50">

    <div class="bg-white max-w-3xl w-full rounded-2xl p-6 relative">
        <button id="closeModal"
                class="absolute top-4 right-4 text-gray-500 text-xl">
            ✕
        </button>

        <img id="modalImage"
             class="w-full h-72 object-cover rounded-xl mb-4">

        <h3 id="modalTitle"
            class="text-2xl font-bold mb-3"></h3>

        <div id="modalDescription"
             class="text-gray-600"></div>
    </div>
</div>

<!-- ================= SCRIPT ================= -->
<script>
const menuBtn = document.getElementById('menuBtn');
const mobileMenu = document.getElementById('mobileMenu');

menuBtn?.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});

const modal = document.getElementById('beritaModal');
const modalTitle = document.getElementById('modalTitle');
const modalDescription = document.getElementById('modalDescription');
const modalImage = document.getElementById('modalImage');
const closeModal = document.getElementById('closeModal');

document.querySelectorAll('.berita-read-more, .content-btn').forEach(el=>{
    el.addEventListener('click', function(e){
        e.preventDefault();
        const parent = this.closest('[data-judul]');
        modalTitle.innerText = parent.dataset.judul;
        modalDescription.innerHTML = parent.dataset.isi;
        modalImage.src = '/storage/' + parent.dataset.gambar;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });
});

closeModal.addEventListener('click',()=>{
    modal.classList.add('hidden');
});
</script>

</body>
</html>
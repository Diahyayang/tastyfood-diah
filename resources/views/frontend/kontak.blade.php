<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kontak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
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
            KONTAK KAMI
        </h1>
    </div>


</section>

<!-- ================= FORM ================= -->
<section class="py-24 bg-white">
<div class="max-w-6xl mx-auto px-6">

    <h2 class="text-2xl font-extrabold mb-10">KONTAK KAMI</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-6 py-4 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ url('/kontak') }}" method="POST" class="grid lg:grid-cols-2 gap-8">
        @csrf

        <div class="space-y-6">
            <input type="text" name="subject"
                class="w-full border-2 border-black rounded-xl px-5 py-3 focus:outline-none"
                placeholder="Subjek" required>

            <input type="text" name="nama"
                class="w-full border-2 border-black rounded-xl px-5 py-3 focus:outline-none"
                placeholder="Nama" required>

            <input type="email" name="email"
                class="w-full border-2 border-black rounded-xl px-5 py-3 focus:outline-none"
                placeholder="Email" required>
        </div>

        <div>
            <textarea name="pesan" rows="8"
                class="w-full border-2 border-black rounded-xl px-5 py-3 focus:outline-none"
                placeholder="Pesan" required></textarea>
        </div>

        <div class="lg:col-span-2">
            <button
                class="w-full bg-black text-white font-bold py-3 rounded-xl hover:bg-gray-800 transition">
                KIRIM
            </button>
        </div>
    </form>

</div>
</section>

<!-- ================= INFO KONTAK ================= -->
<section class="py-20 bg-white">
<div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-10 text-center">

    <div>
        <div class="w-24 h-24 bg-black rounded-full flex items-center justify-center mx-auto mb-4">
            <img src="/storage/images/Group 66.png" class="w-14">
        </div>
        <h5 class="font-bold mb-2">EMAIL</h5>
        <p class="text-gray-600">tastyfood@gmail.com</p>
    </div>

    <div>
        <div class="w-24 h-24 bg-black rounded-full flex items-center justify-center mx-auto mb-4">
            <img src="/storage/images/phone (1).png" class="w-14">
        </div>
        <h5 class="font-bold mb-2">PHONE</h5>
        <p class="text-gray-600">081234567890</p>
    </div>

    <div>
        <div class="w-24 h-24 bg-black rounded-full flex items-center justify-center mx-auto mb-4">
            <img src="/storage/images/location.png" class="w-14">
        </div>
        <h5 class="font-bold mb-2">LOCATION</h5>
        <p class="text-gray-600">Bandung</p>
    </div>

</div>
</section>

<!-- ================= MAP ================= -->
<section class="py-20 bg-gray-200/40">
<div class="max-w-6xl mx-auto px-6">
    <div class="aspect-video rounded-2xl overflow-hidden shadow-lg">
        <iframe 
            src="https://www.google.com/maps?q=bandung&output=embed"
            class="w-full h-full"
            allowfullscreen
            loading="lazy">
        </iframe>
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



<script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
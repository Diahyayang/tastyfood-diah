<nav class="w-full bg-gradient-to-r from-blue-900 to-blue-700 text-white shadow-lg">

<div class="max-w-7xl mx-auto px-6">
<div class="flex items-center justify-between h-16">

<!-- BURGER -->
<button onclick="toggleMenu()" class="md:hidden text-2xl">
☰
</button>

<!-- LOGO -->
<h1 class="text-lg font-bold tracking-widest">
ADMIN
</h1>

<!-- MENU DESKTOP -->
<div class="hidden md:flex space-x-6 items-center">

<a href="/dashboard" class="hover:bg-white/20 px-4 py-2 rounded-lg transition">
🏠 Dashboard
</a>

<a href="/admin/kontak" class="hover:bg-white/20 px-4 py-2 rounded-lg transition">
📞 Kontak
</a>

<a href="/admin/gallery" class="hover:bg-white/20 px-4 py-2 rounded-lg transition">
🖼️ Galeri
</a>

<a href="/admin/berita" class="hover:bg-white/20 px-4 py-2 rounded-lg transition">
📰 Berita
</a>

<a href="/admin/tentang" class="hover:bg-white/20 px-4 py-2 rounded-lg transition">
📄 Tentang
</a>
<!-- BOTTOM -->







<a href="/" class="view-site">
    🌐 Lihat Website
</a>





<form action="{{ route('logout') }}" method="POST">
@csrf
<button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg transition">
🚪 Logout
</button>
</form>

</div>

</div>
</div>

</nav>

<!-- OVERLAY -->
<div id="overlay"
onclick="toggleMenu()"
class="fixed inset-0 bg-black/40 hidden z-40">
</div>

<!-- SIDEBAR MOBILE -->
<div id="mobileMenu"
class="fixed top-0 left-0 w-64 h-full bg-blue-900 text-white p-6 transform -translate-x-full transition duration-300 z-50 md:hidden">

<h2 class="text-xl font-bold mb-8">MENU</h2>

<nav class="space-y-3">

<a href="/dashboard" class="block py-2 px-3 rounded-lg hover:bg-white/20">
🏠 Dashboard
</a>

<a href="/admin/kontak" class="block py-2 px-3 rounded-lg hover:bg-white/20">
📞 Kontak
</a>

<a href="/admin/gallery" class="block py-2 px-3 rounded-lg hover:bg-white/20">
🖼️ Galeri
</a>

<a href="/admin/berita" class="block py-2 px-3 rounded-lg hover:bg-white/20">
📰 Berita
</a>

<a href="/admin/tentang" class="block py-2 px-3 rounded-lg hover:bg-white/20">
📄 Tentang
</a>

<form action="{{ route('logout') }}" method="POST" class="mt-6">
@csrf
<button class="w-full bg-red-500 hover:bg-red-600 py-2 rounded-lg">
🚪 Logout
</button>
</form>

</nav>

</div>
<header x-data="{open:false}" class="absolute top-6 left-0 w-full z-50">

<div class="max-w-7xl mx-auto px-6 flex items-center gap-12">

<!-- LOGO -->
<h1 class="text-2xl font-bold">
TASTY FOOD
</h1>

<!-- MENU DESKTOP -->
<nav class="hidden md:block ml-16">
<ul class="flex gap-6 uppercase text-sm">

<li>
<a href="/" class="relative pb-1 after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-full after:bg-black after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
Home
</a>
</li>

<li>
<a href="/tentang" class="relative pb-1 after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-full after:bg-black after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
Tentang
</a>
</li>

<li>
<a href="/berita" class="relative pb-1 after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-full after:bg-black after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
Berita
</a>
</li>

<li>
<a href="/gallery" class="relative pb-1 after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-full after:bg-black after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
Galeri
</a>
</li>

<li>
<a href="/kontak" class="relative pb-1 after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-full after:bg-black after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
Kontak
</a>
</li>

</ul>
</nav>

<!-- BURGER -->
<button @click="open=true" class="md:hidden ml-auto">
<svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="3">
<path d="M4 6h16M4 12h16M4 18h16"/>
</svg>
</button>

</div>


<!-- OVERLAY -->
<div 
x-show="open"
x-transition.opacity
class="fixed inset-0 bg-black/40 z-40"
@click="open=false"
></div>


<!-- SIDEBAR MENU -->
<div
x-show="open"
x-transition:enter="transition transform duration-300"
x-transition:enter-start="-translate-x-full"
x-transition:enter-end="translate-x-0"
x-transition:leave="transition transform duration-300"
x-transition:leave-start="translate-x-0"
x-transition:leave-end="-translate-x-full"
class="fixed top-0 left-0 w-[85%] max-w-sm h-full bg-white z-50 p-8"
>

<!-- HEADER MENU -->
<div class="flex justify-between items-center mb-12">

<div class="text-sm tracking-widest text-gray-500">
MENU
</div>

<button @click="open=false" class="bg-black text-white w-8 h-8 flex items-center justify-center rounded">
✕
</button>

</div>


<!-- MENU LIST -->
<ul class="space-y-8 text-center uppercase tracking-widest font-semibold text-lg">

<li>
<div class="w-8 h-[2px] bg-orange-500 mx-auto mb-4"></div>
<a href="/" @click="open=false">Home</a>
</li>

<li><a href="/tentang" @click="open=false">Tentang</a></li>

<li><a href="/berita" @click="open=false">Berita</a></li>

<li><a href="/gallery" @click="open=false">Galeri</a></li>

<li><a href="/kontak" @click="open=false">Kontak</a></li>

</ul>

</div>

</header>
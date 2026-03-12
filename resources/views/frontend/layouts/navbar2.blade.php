<!-- ================= NAVBAR ================= -->
<nav x-data="{open:false}" class="absolute top-6 left-0 w-full z-50 px-6 lg:px-24">

<div class="flex justify-between items-center">

<a href="/" class="text-white font-sansbold text-xl tracking-wide">
TASTY FOOD
</a>

<!-- BURGER -->
<button @click="open=true" class="lg:hidden text-white">
<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M4 6h16M4 12h16M4 18h16"/>
</svg>
</button>

<!-- MENU DESKTOP -->
<ul class="hidden lg:flex gap-6 text-white text-sm font-sans tracking-wider">

<li>
<a href="/" 
class="{{ request()->is('/') ? 'border-b-2 border-white' : 'hover:text-gray-300' }}">
HOME
</a>
</li>

<li>
<a href="/tentang" 
class="{{ request()->is('tentang') ? 'border-b-2 border-white' : 'hover:text-gray-300' }}">
TENTANG
</a>
</li>

<li>
<a href="/berita" 
class="{{ request()->is('berita') ? 'border-b-2 border-white' : 'hover:text-gray-300' }}">
BERITA
</a>
</li>

<li>
<a href="/gallery" 
class="{{ request()->is('gallery') ? 'border-b-2 border-white' : 'hover:text-gray-300' }}">
GALERI
</a>
</li>

<li>
<a href="/kontak" 
class="{{ request()->is('kontak') ? 'border-b-2 border-white' : 'hover:text-gray-300' }}">
KONTAK
</a>
</li>

</ul>

</div>


<!-- OVERLAY -->
<div
x-cloak 
x-show="open"
x-transition.opacity
class="fixed inset-0 bg-black/40 z-40 lg:hidden"
@click="open=false"
></div>


<!-- SIDEBAR MOBILE -->
<div
x-cloak
x-show="open"
x-transition:enter="transition transform duration-300"
x-transition:enter-start="-translate-x-full"
x-transition:enter-end="translate-x-0"
x-transition:leave="transition transform duration-300"
x-transition:leave-start="translate-x-0"
x-transition:leave-end="-translate-x-full"
class="fixed top-0 left-0 w-[85%] max-w-sm h-full bg-white z-50 p-8 lg:hidden"
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
<a href="/" @click="open=false">HOME</a>
</li>

<li>
<a href="/tentang" @click="open=false">TENTANG</a>
</li>

<li>
<a href="/berita" @click="open=false">BERITA</a>
</li>

<li>
<a href="/gallery" @click="open=false">GALERI</a>
</li>

<li>
<a href="/kontak" @click="open=false">KONTAK</a>
</li>

</ul>

</div>

</nav>
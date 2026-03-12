<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-gray-100 min-h-screen">

@php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

$totalGaleri  = Schema::hasTable('galleries') ? DB::table('galleries')->count() : 0;
$totalBerita  = Schema::hasTable('beritas') ? DB::table('beritas')->count() : 0;
$totalKontak  = Schema::hasTable('contacts') ? DB::table('contacts')->count() : 0;
$totalTentang = Schema::hasTable('tentangs') ? DB::table('tentangs')->count() : 0;

/* Statistik Bulanan */
$bulan = [];
$kontakBulanan = [];

for ($i = 1; $i <= 12; $i++) {
$bulan[] = Carbon::create()->month($i)->translatedFormat('M');

$kontakBulanan[] = Schema::hasTable('contacts')
? DB::table('contacts')
->whereMonth('created_at',$i)
->count()
: 0;
}

/* Pesan Terbaru */
$pesanTerbaru = Schema::hasTable('contacts')
? DB::table('contacts')->latest()->take(5)->get()
: [];
@endphp
@php
$totalSemua = $totalGaleri + $totalKontak + $totalBerita + $totalTentang;

$persenGaleri = $totalSemua > 0 ? round($totalGaleri / $totalSemua * 100) : 0;
$persenKontak = $totalSemua > 0 ? round($totalKontak / $totalSemua * 100) : 0;
$persenBerita = $totalSemua > 0 ? round($totalBerita / $totalSemua * 100) : 0;
$persenTentang = $totalSemua > 0 ? round($totalTentang / $totalSemua * 100) : 0;
@endphp
@include('admin.layouts.navbar')

<!-- MAIN -->
<div class="flex-1 p-6 md:p-8 md:ml-[50px] transition-all duration-300">

<!-- Welcome -->
<div class="bg-white p-6 rounded-2xl shadow-md mb-8 text-lg font-semibold">
Selamat Datang, Admin 👋
</div>

<!-- Cards -->
<div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">

<div class="bg-white p-6 rounded-2xl shadow text-center">
<h3 class="text-blue-900 font-semibold mb-2">🖼️ Galeri</h3>
<div class="text-4xl font-bold text-blue-700 counter" data-target="{{ $totalGaleri }}">0</div>
<p class="text-gray-500 text-sm">Total foto galeri</p>
</div>

<div class="bg-white p-6 rounded-2xl shadow text-center">
<h3 class="text-blue-900 font-semibold mb-2">📞 Kontak</h3>
<div class="text-4xl font-bold text-yellow-500 counter" data-target="{{ $totalKontak }}">0</div>
<p class="text-gray-500 text-sm">Pesan dari pengunjung</p>
</div>

<div class="bg-white p-6 rounded-2xl shadow text-center">
<h3 class="text-blue-900 font-semibold mb-2">📰 Berita</h3>
<div class="text-4xl font-bold text-purple-600 counter" data-target="{{ $totalBerita }}">0</div>
<p class="text-gray-500 text-sm">Total berita</p>
</div>

<div class="bg-white p-6 rounded-2xl shadow text-center">
<h3 class="text-blue-900 font-semibold mb-2">📄 Tentang</h3>
<div class="text-4xl font-bold text-green-600 counter" data-target="{{ $totalTentang }}">0</div>
<p class="text-gray-500 text-sm">Konten tentang</p>
</div>

</div>

<!-- Charts -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-12">

<div class="bg-white p-4 md:p-6 rounded-2xl shadow-lg overflow-hidden">
<h2 class="font-bold mb-4">📊 Total Data</h2>
<div class="h-56 md:h-64">
<canvas id="barChart" class="w-full max-w-full"></canvas>
</div>
</div>

<div class="bg-white p-6 rounded-2xl shadow-lg">
<h2 class="font-bold mb-4">🥧 Perbandingan Data</h2>

<div class="flex flex-col md:flex-row items-center gap-6">

<div class="w-full md:w-1/2">
<canvas id="pieChart"></canvas>
</div>

<div class="w-full md:w-1/2 space-y-3 text-sm">

<div class="flex justify-between">
<span class="flex items-center gap-2">
<span class="w-3 h-3 bg-blue-500 rounded-full"></span>
Galeri
</span>
<span class="font-bold">{{ $persenGaleri }}%</span>
</div>

<div class="flex justify-between">
<span class="flex items-center gap-2">
<span class="w-3 h-3 bg-orange-500 rounded-full"></span>
Kontak
</span>
<span class="font-bold">{{ $persenKontak }}%</span>
</div>

<div class="flex justify-between">
<span class="flex items-center gap-2">
<span class="w-3 h-3 bg-purple-500 rounded-full"></span>
Berita
</span>
<span class="font-bold">{{ $persenBerita }}%</span>
</div>

<div class="flex justify-between">
<span class="flex items-center gap-2">
<span class="w-3 h-3 bg-green-500 rounded-full"></span>
Tentang
</span>
<span class="font-bold">{{ $persenTentang }}%</span>
</div>

</div>

</div>

</div>

<div class="bg-white p-4 md:p-6 rounded-2xl shadow-lg overflow-hidden lg:col-span-2">
<h2 class="font-bold mb-4">📈 Statistik Pesan per Bulan</h2>
<div class="h-64 md:h-72">
<canvas id="lineChart" class="w-full max-w-full"></canvas>
</div>
</div>

</div>

<!-- PESAN TERBARU -->
<div class="bg-white p-6 rounded-2xl shadow-lg mt-10">

<h2 class="font-bold mb-6 text-lg">
🔥 Pesan Terbaru dari Pengunjung
</h2>

<div class="overflow-x-auto">

<table class="w-full text-sm text-left">

<thead class="bg-gray-100">
<tr>
<th class="px-4 py-3">Nama</th>
<th class="px-4 py-3">Email</th>
<th class="px-4 py-3">Pesan</th>
<th class="px-4 py-3">Tanggal</th>
</tr>
</thead>

<tbody class="divide-y">

@forelse($pesanTerbaru as $pesan)

<tr class="hover:bg-gray-50">

<td class="px-4 py-3 font-medium">
{{ $pesan->nama }}
</td>

<td class="px-4 py-3 text-gray-600">
{{ $pesan->email }}
</td>

<td class="px-4 py-3 text-gray-600 max-w-xs truncate">
{{ $pesan->pesan }}
</td>

<td class="px-4 py-3 text-gray-500">
{{ \Carbon\Carbon::parse($pesan->created_at)->format('d M Y') }}
</td>

</tr>

@empty

<tr>
<td colspan="4" class="text-center py-6 text-gray-500">
Belum ada pesan
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

<script>

function toggleSidebar(){
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

sidebar.classList.toggle('-translate-x-full');
overlay.classList.toggle('hidden');
}

/* Counter */

document.querySelectorAll('.counter').forEach(counter => {

const target = +counter.getAttribute('data-target');
let count = 0;

const increment = target / 100;

const update = () => {

if(count < target){

count += increment;

counter.innerText = Math.ceil(count);

setTimeout(update,15);

}else{

counter.innerText = target;

}

};

update();

});

/* BAR CHART */

new Chart(document.getElementById('barChart'),{

type:'bar',

data:{

labels:['Galeri','Kontak','Berita','Tentang'],

datasets:[{

data:[{{ $totalGaleri }},{{ $totalKontak }},{{ $totalBerita }},{{ $totalTentang }}],

backgroundColor:['#3B82F6','#F59E0B','#8B5CF6','#10B981']

}]

},

options:{plugins:{legend:{display:false}},scales:{y:{beginAtZero:true}}}

});

/* PIE */

new Chart(document.getElementById('pieChart'),{

type:'pie',

data:{

labels:['Galeri','Kontak','Berita','Tentang'],

datasets:[{

data:[{{ $totalGaleri }},{{ $totalKontak }},{{ $totalBerita }},{{ $totalTentang }}],

backgroundColor:['#3B82F6','#F59E0B','#8B5CF6','#10B981']

}]

}

});

/* LINE */

new Chart(document.getElementById('lineChart'),{

type:'line',

data:{

labels:{!! json_encode($bulan) !!},

datasets:[{

label:'Pesan Masuk',

data:{!! json_encode($kontakBulanan) !!},

borderColor:'#3B82F6',

backgroundColor:'rgba(59,130,246,0.2)',

fill:true,

tension:0.4

}]

},

options: {
    responsive: true,
    maintainAspectRatio: false
}

});

</script>
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
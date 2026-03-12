@extends('frontend.layouts.app')


@section('content')


{{-- ================= HERO ================= --}}
<section class="relative bg-gray-100 min-h-[135vh] pt-[120px] pb-[70px] overflow-hidden  ">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 items-center ">
        {{-- TEXT --}}
        <div class="relative z-10 pt-[82px] lg:pt-0">
            <div class="w-20 h-[2px] bg-black mb-6"></div>
                        <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight">
                            <span class="font-light">HEALTHY</span><br>
                            TASTY FOOD
                        </h1>
                        <p class="mt-4 text-gray-800 max-w-xl">
                            Tasty Food menghadirkan makanan sehat dengan bahan segar dan kualitas terbaik. Setiap menu dibuat dengan penuh perhatian untuk menjaga cita rasa dan nutrisi, sehingga Anda bisa menikmati makanan yang lezat sekaligus menyehatkan.
                        </p>
                        <a href="{{ route('tentang') }}"
            class="inline-block mt-6 bg-black text-white px-14 py-2 font-bold text-sm
                    transition duration-300 transform
                    hover:bg-gray-700 hover:-translate-y-1  hover:shadow-2xl">
                TENTANG KAMI
            </a>
        </div>

       {{-- IMAGE --}}
        <div class="
    /* ===== MOBILE ===== */
    absolute
    -top-20
    left-1/2
    -translate-x-1/2
    w-full
    flex justify-right
    z-0

    /* ===== DESKTOP ===== */
    lg:top-[-150px]
    lg:right-[-780px]
    lg:left-auto
    lg:translate-x-0
">

    <img
        src="{{ asset('storage/images/img-4.png') }}"
        class="
            /* ===== MOBILE ===== */
            w-[120vw]
            max-w-none
            object-cover

            /* ===== DESKTOP ===== */
            lg:w-[730px]
        ">
</div>
    </div>
</section>

{{-- ================= TENTANG ================= --}}
<section class="relative mt-[-200px] py-24 bg-white text-center">
    <div class="max-w-4xl mx-auto px-2">
        <h2 class="text-2xl lg:text-3xl font-bold mb-6">
            TENTANG KAMI
        </h2>
        <p class="text-gray-800 leading-relaxed text-base mb-8">
            “Tasty Food adalah usaha kuliner yang berfokus pada penyajian makanan sehat, lezat, dan berkualitas. Kami menggunakan bahan-bahan segar pilihan serta proses yang higienis untuk memastikan setiap hidangan memberikan rasa terbaik dan manfaat bagi kesehatan.”
        </p>
        <div class="w-28 h-[3px] bg-black mx-auto"></div>
    </div>
</section>

{{-- ================= GALLERY REVIEW ================= --}}
<section class="relative bg-cover bg-center pt-44 pb-32"
    style="background-image:url('{{ asset('storage/images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}')">




    <div class="absolute inset-0 bg-black/60"></div>




    <div class="relative max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-16">




           @foreach([
    ['img-1.png','Healthy Food','Menu sehat dan bernutrisi untuk mendukung gaya hidup lebih baik setiap hari.'],
    ['img-2.png','Fresh Ingredients','Menggunakan bahan segar pilihan yang diproses secara higienis dan berkualitas.'],
    ['img-3.png','Best Quality','Setiap hidangan dibuat dengan standar kualitas terbaik untuk kepuasan pelanggan.'],
    ['img-4.png','Fast Delivery','Pesanan diproses dengan cepat dan dikirim tepat waktu dalam kondisi terbaik.']
] as $item)




            <a href="{{ route('tentang') }}"
               class="group block rounded-xl shadow-xl p-8 text-center relative
       bg-gradient-to-b from-white/0 to-white
       transform transition duration-300 hover:-translate-y-4 hover:shadow-2xl">
                <img src="{{ asset('storage/images/'.$item[0]) }}"
                     class="w-40 h-40 rounded-full object-cover absolute -top-16 left-1/2
                            -translate-x-1/2 shadow-lg">




                <div class="pt-20">
                    <h3 class="font-bold text-lg mb-3">{{ $item[1] }}</h3>
                    <p class="text-sm text-gray-800">
    {{ $item[2] }}
</p>
                   
                </div>




            </a>




            @endforeach




        </div>
    </div>
</section>

{{-- ================= BERITA ================= --}}
<section class="py-24 bg-gray-50">
<div class="max-w-6xl mx-auto px-4">

    <h2 class="text-2xl font-bold text-center mb-12">
        BERITA KAMI
    </h2>

    @if($beritas->count())
    @php
        $utama = $beritas->first();
        $kecil = $beritas->skip(1)->take(4);
    @endphp

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-2">

        {{-- ===================== --}}
        {{-- BERITA BESAR --}}
        {{-- ===================== --}}
        <div class="lg:col-span-2 bg-white rounded-xl shadow-lg overflow-hidden flex flex-col">

            <img src="{{ Storage::url($utama->gambar) }}"
                 class="w-full h-64 sm:h-72 lg:h-[300px] object-cover">

            <div class="p-6 flex flex-col flex-1">

                <h3 class="text-xl sm:text-2xl font-bold mb-3 uppercase">
                    {{ $utama->judul }}
                </h3>

                <p class="text-sm text-gray-500 mb-6 leading-relaxed flex-1">
                    {{ \Illuminate\Support\Str::limit($utama->isi, 220) }}
                </p>

                <button onclick="showBeritaModal(
                    '{{ Storage::url($utama->gambar) }}',
                    `{{ $utama->judul }}`,
                    `{{ $utama->isi }}`
                )"
                class="text-orange-500 font-semibold mt-auto self-start">
                    Baca selengkapnya
                </button>

            </div>
        </div>

        {{-- ===================== --}}
        {{-- 4 BERITA KECIL --}}
        {{-- ===================== --}}
        <div class="lg:col-span-2 grid grid-cols-2 sm:grid-cols-2 gap-2">

            @foreach($kecil as $item)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col">

                <img src="{{ Storage::url($item->gambar) }}"
                     class="w-full h-32 sm:h-36 object-cover">

                <div class="p-4 flex flex-col flex-1">

                    <h4 class="font-bold text-sm mb-2 uppercase">
                        {{ $item->judul }}
                    </h4>

                    <p class="text-sm text-gray-500 mb-3 flex-1">
                        {{ \Illuminate\Support\Str::limit($item->isi, 90) }}
                    </p>

                    <button onclick="showBeritaModal(
                        '{{ Storage::url($item->gambar) }}',
                        `{{ $item->judul }}`,
                        `{{ $item->isi }}`
                    )"
                    class="text-orange-500 font-semibold text-sm mt-auto self-start">
                        Baca selengkapnya
                    </button>

                </div>
            </div>
            @endforeach

        </div>

    </div>
    @endif
    <div class="flex justify-center mt-8">

<a href="/berita" 
class="inline-block mt-6 bg-black text-white px-14 py-2 text-sm font-semibold rounded-lg hover:bg-gray-800 transition ">
Lihat Lebih Lanjut
<span>→</span>
</a>

</div>
</div>
</section>

{{-- ================= GALLERY ================= --}}
<section class="pt-8 pb-20 py-24 bg-white">
<div class="max-w-6xl mx-auto px-4">


<h2 class="text-2xl font-bold text-center mb-12">
GALLERY KAMI
</h2>


<div class="flex lg:grid lg:grid-cols-3 gap-2
overflow-x-auto snap-x snap-mandatory pb-6">


@foreach ($galleries->take(6) as $item)
<div
class="relative bg-white rounded-xl  overflow-hidden cursor-pointer
h-[260px] group min-w-[260px] snap-center"
onclick="showGalleryModal('{{ Storage::url($item->gambar) }}')">


<img
src="{{ Storage::url($item->gambar) }}"
class="w-full h-full object-cover
transition duration-500 group-hover:scale-110">


</div>
@endforeach


</div>


<div class="mt-12 text-center">
<a href="{{ route('gallery') }}"
class="inline-block mt-6 bg-black text-white px-14 py-2 text-sm font-semibold rounded-lg hover:bg-gray-800 transition ">
Lihat selengkapnya
</a>
</div>


</div>
</section>


{{-- ================= MODAL BERITA ================= --}}
<div id="beritaModal"
class="fixed inset-0 bg-black/70 hidden 
       items-center justify-center 
       z-50 p-4 sm:p-6">

    <div class="bg-white w-full max-w-3xl 
                rounded-xl shadow-lg overflow-hidden 
                flex flex-col 
                max-h-[95vh] sm:max-h-[90vh]">

        {{-- HEADER --}}
        <div class="px-4 sm:px-6 py-3 sm:py-4 
                    border-b font-bold 
                    text-base sm:text-lg">
            DETAIL BERITA
        </div>

        {{-- BODY --}}
        <div class="p-4 sm:p-6 
                    overflow-y-auto flex-1">

            <img id="beritaImg"
                 class="w-full 
                        h-48 sm:h-64 lg:h-[320px] 
                        object-cover 
                        rounded-lg mb-4 sm:mb-6">

            <h3 id="beritaTitle"
                class="font-bold 
                       text-lg sm:text-xl 
                       mb-3 sm:mb-4 uppercase"></h3>

            <p id="beritaText"
               class="text-gray-600 
                      text-sm sm:text-base
                      leading-relaxed 
                      whitespace-pre-line"></p>

        </div>

        {{-- FOOTER --}}
        <div class="px-4 sm:px-6 py-3 sm:py-4 
                    border-t flex justify-end">

            <button onclick="closeBeritaModal()"
                    class="bg-gray-600 text-white 
                           px-4 sm:px-6 py-2 
                           text-sm sm:text-base
                           rounded-lg hover:bg-gray-700 transition">
                Tutup
            </button>

        </div>

    </div>
</div>
{{-- ================= MODAL GALLERY ================= --}}
<div id="galleryModal"
class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">


<div class="relative">
<button onclick="closeGalleryModal()"
class="absolute -top-4 -right-4 bg-white rounded-full w-8 h-8 shadow text-xl">
✕
</button>


<img id="galleryImg"
class="max-h-[85vh] max-w-[90vw] rounded-xl shadow-xl object-contain">
</div>
</div>


<script>
function showBeritaModal(img,title,text){
document.getElementById('beritaImg').src = img;
document.getElementById('beritaTitle').innerText = title;
document.getElementById('beritaText').innerText = text;
const modal = document.getElementById('beritaModal');
modal.classList.remove('hidden');
modal.classList.add('flex');
}


function closeBeritaModal(){
document.getElementById('beritaModal').classList.add('hidden');
}


function showGalleryModal(img){
document.getElementById('galleryImg').src = img;
const modal = document.getElementById('galleryModal');
modal.classList.remove('hidden');
modal.classList.add('flex');
}


function closeGalleryModal(){
document.getElementById('galleryModal').classList.add('hidden');
}
</script>


@endsection

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use App\Models\Gallery;
use App\Models\Tentang;
use App\Models\Berita;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'kontak'  => Kontak::count(),
            'gallery' => Gallery::count(),
            'tentang' => Tentang::count(),
            'berita'  => Berita::count(),
        ]);
    }
}

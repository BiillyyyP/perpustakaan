<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\anggota;
use App\Models\kategori;
use App\Models\penerbit;
use App\Models\buku;

class DashboardController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $buku = Buku::all();
        return view ('dashboard.index', compact('anggota','kategori','penerbit','buku'));
    }   
}

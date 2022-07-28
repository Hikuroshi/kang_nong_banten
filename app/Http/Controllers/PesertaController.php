<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function home()
    {
        return view('index', [
            'title' => 'Kang Nong Banten',
            'pesertas' => Peserta::latest()->get()
        ]);
    }

    public function index()
    {
        return view('pesertas', [
            'title' => 'Semua Peserta Kang Nong Banten',
            'pesertas' => Peserta::latest()->filter(request(['search', 'wilayah', 'author', 'kategori']))->paginate(10)->withQueryString()
        ]);
    }

    public function show(Peserta $peserta)
    {
        return view('peserta', [
            'title' => $peserta->nama_peserta,
            'pesertas' => $peserta
        ]);
    }

    public function about()
    {
        return view('about', [
            'title' => 'Tentang kami'
        ]);
    }
}

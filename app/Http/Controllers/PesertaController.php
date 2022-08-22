<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Peserta;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $title = '';

        if (request('kategori')) {
            $kategori = Kategori::firstWhere('slug', request('kategori'));
            $title = ' in ' . $kategori->nama_kategori;
        }

        if (request('wilayah')) {
            $wilayah = Wilayah::firstWhere('slug', request('wilayah'));
            $title = ' in ' . $wilayah->nama_wilayah;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('pesertas.pesertas', [
            'title' => 'Semua Peserta' . $title,
            'pesertas' => Peserta::latest()->filter(request(['search', 'wilayah', 'author', 'kategori', 'angkatan']))->paginate(10)->withQueryString()
        ]);
    }
}

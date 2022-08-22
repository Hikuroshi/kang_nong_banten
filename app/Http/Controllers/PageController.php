<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('index', [
            'title' => 'Kang Nong Banten',
            'pesertas' => Peserta::latest()->get()
        ]);
    }

    public function about()
    {
        return view('about', [
            'title' => 'Tentang kami'
        ]);
    }

}

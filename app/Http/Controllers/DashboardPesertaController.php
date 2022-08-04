<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Peserta;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->username == 'admin_knb'){
            $admin = Peserta::all();
        } else {
            $admin = Peserta::where('user_id', auth()->user()->id)->get();
        }

        return view('dashboard.index', [
            'title' => 'Para Peserta Kang Nong Banten',
            'pesertas' => $admin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create', [
            'title' => 'Tambah Peserta Kang Nong Banten',
            'wilayahs' => Wilayah::all(),
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Peserta $peserta)
    {
        $validatedData = $request->validate([
            'nama_peserta' => 'required|max:100',
            'kategori_id' => 'required',
            'wilayah_id' => 'required',
            'telepon' => 'required|min:10|max:15|unique:pesertas',
            'keterangan' => 'max:255',
            'foto' => 'required|image|file|max:512'
        ]);

        $validatedData['nama_peserta'] = ucwords($request->nama_peserta);
        $validatedData['foto'] = $request->file('foto')->store('foto-peserta');
        $validatedData['user_id'] = auth()->user()->id;

        $slug = Peserta::where('nama_peserta', $request->nama_peserta)->get();
        $slugCount = count($slug) . "-" . Str::random(40);
        $validatedData['slug'] = Str::of($request->nama_peserta . "-" . $slugCount)->slug('-');

        Peserta::create($validatedData);
        return redirect('/dashboard/pesertas')->with('success', 'Peserta berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function show(Peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function edit(Peserta $peserta)
    {
        if (auth()->user()->username !== 'admin_knb' && $peserta->author->id !== auth()->user()->id){
            abort(403);
        }

        return view('dashboard.edit', [
            'title' => 'Edit Peserta Kang Nong Banten',
            'peserta' => $peserta,
            'wilayahs' => Wilayah::all(),
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peserta $peserta)
    {
        $rules = [
            'nama_peserta' => 'required|max:100',
            'kategori_id' => 'required',
            'wilayah_id' => 'required',
            'keterangan' => 'max:255',
            'foto' => 'image|file|max:1024'
        ];
        
        if($request->telepon != $peserta->telepon){
            $rules['telepon'] = 'required|min:10|max:15|unique:pesertas';
        }
        
        $validatedData = $request->validate($rules);
        
        if($request->file('foto')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['foto'] = $request->file('foto')->store('foto-peserta');
        }
        
        $validatedData['nama_peserta'] = ucwords($request->nama_peserta);
        $validatedData['user_id'] = auth()->user()->id;
        
        $slug = Peserta::where('nama_peserta', $request->nama_peserta)->get();
        $slugCount = count($slug) . "-" . Str::random(40);
        
        if($request->nama_peserta == $peserta->nama_peserta){
            $validatedData['slug'] = $peserta->slug;
        } else {
            $validatedData['slug'] = Str::of($request->nama_peserta . "-" . $slugCount)->slug('-');
        }

        Peserta::where('id', $peserta->id)->update($validatedData);
        return redirect('/dashboard/pesertas')->with('success', 'Peserta berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peserta $peserta)
    {
        if($peserta->foto){
            Storage::delete($peserta->foto);
        }
        Peserta::destroy($peserta->id);
        return redirect('/dashboard/pesertas')->with('success', 'Peserta berhasil dihapus!');
    }
}

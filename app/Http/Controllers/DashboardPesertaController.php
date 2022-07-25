<?php

namespace App\Http\Controllers;

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
        return view('dashboard.index', [
            'title' => 'Para Peserta Kang Nong Banten',
            'pesertas' => Peserta::where('user_id', auth()->user()->id)->get()
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
            'wilayahs' => Wilayah::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_peserta' => 'required|max:100',
            'wilayah_id' => 'required',
            'telepon' => 'required|min:10|max:15|unique:pesertas',
            'keterangan' => 'max:255',
            'foto' => 'required|image|file|max:1024'
        ]);

        $validatedData['foto'] = $request->file('foto')->store('foto-peserta');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::of($request->nama_peserta)->slug('-');

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
        return view('dashboard.edit', [
            'title' => 'Edit Peserta Kang Nong Banten',
            'peserta' => $peserta,
            'wilayahs' => Wilayah::all()
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
        $validatedData = $request->validate([
            'nama_peserta' => 'required|max:100',
            'telepon' => 'required|max:15',
            'wilayah_id' => 'required',
            'keterangan' => 'max:255',
            'foto' => 'image|file|max:1024'
        ]);

        if($request->file('foto')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['foto'] = $request->file('foto')->store('foto-peserta');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::of($request->nama_peserta)->slug('-');

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

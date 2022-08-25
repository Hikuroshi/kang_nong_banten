<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->username == 'admin_knb'){
            $admin = Post::all();
        } else {
            $admin = Post::where('user_id', auth()->user()->id)->get();
        }

        return view('dashboard.posts.index', [
            'title' => 'Dokumentasi',
            'posts' => $admin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'title' => 'Tambah Dokumentasi'
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
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'foto' => 'required|image|file|max:512'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['judul'] = ucwords($request->judul);
        $validatedData['foto'] = $request->file('foto')->store('foto-post');

        $slug = Post::where('judul', $request->judul)->get();
        $slugCount = count($slug) . "-" . Str::random(40);
        $validatedData['slug'] = Str::of($request->nama_peserta . "-" . $slugCount)->slug('-');

        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success', 'Postingan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (auth()->user()->username !== 'admin_knb' && $post->author->id !== auth()->user()->id){
            abort(403);
        }

        return view('dashboard.posts.show', [
            'title' => $post->judul,
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (auth()->user()->username !== 'admin_knb' && $post->author->id !== auth()->user()->id){
            abort(403);
        }

        return view('dashboard.posts.edit', [
            'title' => 'Edit' . $post->judul,
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:100',
            'deskripsi' => 'required',
            'foto' => 'image|file|max:512'
        ]);
        
        if($request->file('foto')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['foto'] = $request->file('foto')->store('foto-post');
        }
        
        $validatedData['judul'] = ucwords($request->judul);
        $validatedData['user_id'] = auth()->user()->id;
        
        $slug = Post::where('judul', $request->judul)->get();
        $slugCount = count($slug) . "-" . Str::random(40);
        
        if($request->judul == $post->judul){
            $validatedData['slug'] = $post->slug;
        } else {
            $validatedData['slug'] = Str::of($request->judul . "-" . $slugCount)->slug('-');
        }
        Post::where('id', $post->id)->update($validatedData);
        return redirect('/dashboard/posts')->with('success', 'Postingan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->foto){
            Storage::delete($post->foto);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Postingan berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|min:5|max:100|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:100'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/dashboard/pesertas')->with('success', 'Akun baru berhasil ditambahkan!');
    }
}

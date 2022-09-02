<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => env('ADMIN_NAME'),
            'username' => env('ADMIN_USERNAME'),
            'email' => env('ADMIN_EMAIL'),
            'password' => bcrypt(env('ADMIN_PASSWORD'))
        ]);

        Wilayah::create([
            'nama_wilayah' => 'Kota Tanggerang',
            'slug' => 'kota-tanggerang'
        ]);

        Wilayah::create([
            'nama_wilayah' => 'Kota Tanggerang Selatan',
            'slug' => 'kota-tanggerang-selatan'
        ]);

        Wilayah::create([
            'nama_wilayah' => 'Kabupaten Tanggerang',
            'slug' => 'kabupaten-tanggerang'
        ]);

        Wilayah::create([
            'nama_wilayah' => 'Kota Cilegon',
            'slug' => 'kota-cilegon'
        ]);

        Wilayah::create([
            'nama_wilayah' => 'Kota Serang',
            'slug' => 'kota-serang'
        ]);

        Wilayah::create([
            'nama_wilayah' => 'Kabupaten Serang',
            'slug' => 'kabupaten-serang'
        ]);

        Wilayah::create([
            'nama_wilayah' => 'Kabupaten Lebak',
            'slug' => 'kabupaten-lebak'
        ]);

        Wilayah::create([
            'nama_wilayah' => 'Kabupaten Pandeglang',
            'slug' => 'kabupaten-pandeglang'
        ]);

        Kategori::create([
            'nama_kategori' => 'Kang',
            'slug' => 'kang'
        ]);

        Kategori::create([
            'nama_kategori' => 'Nong',
            'slug' => 'nong'
        ]);
    }
}

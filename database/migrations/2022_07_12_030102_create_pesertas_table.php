<?php

use App\Models\Kategori;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Wilayah::class);
            $table->foreignIdFor(Kategori::class);
            $table->string('nama_peserta', 100);
            $table->string('slug')->unique();
            $table->string('angkatan');
            $table->string('telepon')->unique();
            $table->string('keterangan')->nullable();
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesertas');
    }
};

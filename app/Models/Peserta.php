<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['wilayah', 'author', 'kategori'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search){
                $query->where('nama_peserta', 'like', '%'. $search. '%')
                    ->orWhere('telepon', 'like', '%' . $search . '%')
                    ->orWhere('angkatan', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['wilayah'] ?? false, fn($query, $wilayah) =>
            $query->whereHas('wilayah', fn($query) =>
                $query->where('slug', $wilayah)
            )
        );

        $query->when($filters['kategori'] ?? false, fn($query, $kategori) =>
            $query->whereHas('kategori', fn($query) =>
                $query->where('slug', $kategori)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

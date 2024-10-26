<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi'; // Nama tabel di database

    // Kolom-kolom yang bisa diisi secara massal
    protected $fillable = ['post_id', 'kode_transaksi', 
        'nama_pelanggan', 'total', 'tanggal_transaksi'];

    // Relasi ke model Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

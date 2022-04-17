<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kategori_id',
        'nama_produk',
        'deskripsi',
        'harga',
        'status',
        'berat',
        'foto_produk',
    ];
}

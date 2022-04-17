<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'produk_id',
        'pelanggan_id',
        'invoice_id',
        'qty',
        'total_harga',
        'status',
        'date',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DetilNota extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'detil_nota';
    protected $primaryKey = 'id_detil';
    protected $fillable = [
        'id_nota',
        'id_produk',
        'jumlah',
        'harga',
        'subtotal',
        'hpp',
        'diskon',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function nota()
    {
        return $this->belongsTo(Nota::class, 'id_nota');
    }

}

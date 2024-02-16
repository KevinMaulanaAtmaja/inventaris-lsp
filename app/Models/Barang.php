<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';
    protected $fillable = ['id', 'nama_barang', 'gambar'];
    protected $hidden = ['id'];

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class, 'id');
    }
}

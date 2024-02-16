<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';
    protected $fillable = ['id', 'id_siswa', 'id_barang', 'tgl_pinjam', 'tgl_kembali'];
    protected $hidden = ['id'];

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}

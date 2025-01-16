<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';
    protected $fillable = ['foto', 'judul', 'deskripsi', 'penulis', 'penerbit', 'tahun_terbit', 'kategori_id', 'stok'];


    public function kategori()  
    {  
        return $this->belongsTo(Kategori::class, 'kategori_id'); 
    }


}

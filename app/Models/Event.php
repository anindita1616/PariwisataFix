<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'lokasi',
        'gambar',
        'kategori',
        'waktu',
        'deskripsi',
    ];
}

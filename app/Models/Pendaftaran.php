<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prodi_id',
        'namalengkap',
        'tgllahir',
        'jk',
        'alamat',
        'agama',
        'telpon',
        'lulusan',
        'status',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}

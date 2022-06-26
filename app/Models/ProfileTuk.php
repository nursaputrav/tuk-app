<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileTuk extends Model
{
    use HasFactory;

    protected $table = 'profile_tuk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_tuk',
        'alamat_tuk',
        'telp_tuk',
        'ketua_tuk',
        'admin_tuk',
        'foto_tuk',
        'foto_lsp',
        'foto_bnsp',
        'mou_tuk'
    ];

    public function getFotoTuk()
    {
        if(!$this->foto_tuk)
        {
            return asset('image/foto_tuk/tuk.png');
        }
        return asset('image/foto_tuk/'.$this->foto_tuk);
    }

    public function getFotoLsp()
    {
        if(!$this->foto_lsp)
        {
            return asset('image/foto_tuk/lsp.png');
        }
        return asset('image/foto_tuk/'.$this->foto_lsp);
    }

    public function getFotoBnsp()
    {
        if(!$this->foto_bnsp)
        {
            return asset('image/foto_tuk/bnsp.png');
        }
        return asset('image/foto_tuk/'.$this->foto_bnsp);
    }
}

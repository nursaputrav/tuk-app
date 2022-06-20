<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_sekolah'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}

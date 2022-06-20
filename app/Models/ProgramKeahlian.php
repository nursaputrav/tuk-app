<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    use HasFactory;

    protected $table = 'program_keahlian';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_keahlian'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}

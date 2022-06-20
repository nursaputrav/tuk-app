<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    use HasFactory;

    protected $table = 'skema';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_skema'];

    public function project()
    {
        return $this->hasOne(Project::class);
    }
}

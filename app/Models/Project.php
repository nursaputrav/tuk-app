<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul_project',
        'alamat_project',
        'login_project',
        'skema_id',
        'user_id',
        'dokumentasi_project',
        'deskripsi'];

    public function skema()
    {
        return $this->belongsTo(Skema::class);

    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

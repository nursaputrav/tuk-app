<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_telp',
        'sekolah_id',
        'program_keahlian_id',
        'jenis_kelamin',
        'level',
        'foto_profile',
        'kelas_id',
        // 'project_id',
        'tahun_ajaran',
        'status_siswa',
        'alamat',
    ];


    public function getFotoProfile()
    {
        if(!$this->foto_profile)
        {
            return asset('image/foto_profile/foto_profile.png');
        }
        return asset('image/foto_profile/'.$this->foto_profile);
    }


    public function kelas()
    {
        return $this->belongsTo(Kelas::class);

    }
    public function program_keahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class);
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }


    public function project()
    {
        return $this->hasMany(Project::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

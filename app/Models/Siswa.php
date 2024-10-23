<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'Users';
    protected $fillable = ['name', 'email', 'password', 'level'];
    protected $hidden = ['password', 'remember_token'];
    // protected $fillable = ['nama_siswa', 'nisn', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat', 'no_hp_siswa', 'email', 'password', 'level'];
}

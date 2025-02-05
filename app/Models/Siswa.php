<?php


namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Siswa extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'siswas';
    protected $fillable = [
        'nama_siswa',
        'email',
        'password',
    ];

    // Jika Anda menggunakan hashing untuk password, pastikan untuk menambahkan ini
    public function getAuthPassword()
    {
        return $this->password;
    }
}

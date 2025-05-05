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
        'kelas',
        'domisili',
        'nama_siswa',
        'nisn_siswa',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat_provinsi',
        'alamat_kabupaten',
        'alamat_kecamatan',
        'alamat_desa',
        'kode_pos',
        'anak_ke',
        'status_anak',
        'agama',
        'no_hp',
        'golongan_darah',
        'penyakit_yang_diderita',
        'no_peserta_ujian',
        'npsn_sekolah_asal',
        'nama_sekolah_asal',
        'jenis_sekolah_asal',
        'alamat_sekolah_provinsi',
        'alamat_sekolah_kabupaten',
        'alamat_sekolah_kecamatan',
        'alamat_sekolah_lengkap',
        'prestasi_yang_diraih',
        'nama_ayah',
        'tempat_lahir_ayah',
        'tanggal_lahir_ayah',
        'hubungan_dengan_siswa_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'tempat_lahir_ibu',
        'tanggal_lahir_ibu',
        'hubungan_dengan_siswa_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'nama_wali',
        'tempat_lahir_wali',
        'tanggal_lahir_wali',
        'pendidikan_wali',
        'pekerjaan_wali',
        'penghasilan_wali',
        'foto_siswa',
        'kartu_keluarga',
        'ijazah_sd_mi',
        'ktp_orang_tua',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'tahun_daftar',
        'status_selesai',
        'status_validasi',
        'role',
    ];

    // Jika Anda menggunakan hashing untuk password, pastikan untuk menambahkan ini
    public function getAuthPassword()
    {
        return $this->password;
    }
}

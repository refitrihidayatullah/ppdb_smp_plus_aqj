<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('siswa', function (Blueprint $table) {
            // identitas siswa diisi (petugas PPDB)
            $table->id();
            $table->enum('kelas', ['Siswa Baru Kelas 7', 'Siswa Baru Kelas 8', 'Siswa Baru Kelas 9']);
            $table->enum('domisili', ['Mondok', 'Tidak Mondok']);

            // identitas siswa diisi (siswa)
            $table->string('nama_siswa');
            $table->string('nisn')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('alamat_provinsi');
            $table->string('alamat_kabupaten');
            $table->string('alamat_kecamatan');
            $table->string('alamat_desa');
            $table->string('kode_pos');
            $table->string('anak_ke');
            $table->enum('status_anak', ['Anak Kandung', 'Anak Yatim', 'Anak Piatu' , 'Anak Yatim Piatu']);
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Budha', 'Hindu', 'Konghucu']);
            $table->string('no_hp');
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O']);
            $table->string('penyakit_yang_diderita');
            // Riwayat Pendidikan
            $table->string('no_peserta_ujian');
            $table->string('npsn_sekolah_asal');
            $table->string('nama_sekolah_asal');
            $table->enum('jenis_sekolah_asal', ['SD', 'MI', 'Paket A', 'SLB']);
            $table->string('alamat_sekolah_provinsi');
            $table->string('alamat_sekolah_kabupaten');
            $table->string('alamat_sekolah_kecamatan');
            $table->string('alamat_sekolah_lengkap');
            // $table->string('no_ijazah_sd');
            // $table->string('no_skhun_sd');
            $table->string('prestasi_yang_diraih');
            // identitas ayah siswa
            $table->string('nama_ayah');
            $table->string('tempat_lahir_ayah');
            $table->date('tanggal_lahir_ayah');
            $table->enum('hubungan_dengan_siswa_ayah', ['Ayah Kandung', 'Ayah Tiri', 'Ayah Angkat']);
            $table->enum('pendidikan_ayah', ['SD/MI', 'SMP/MTs', 'SMA/SMK/MA', 'Diploma', 'S1', 'S2', 'S3']);
            $table->string('pekerjaan_ayah');
            $table->enum('penghasilan_ayah', ['Kurang dari Rp. 500.000', 'Rp. 500.000 - Rp. 1.000.000', 'Rp. 1.000.000 - Rp. 2.000.000', 'Rp. 2.000.000 - Rp. 3.000.000', 'Lebih Dari Rp. 3.000.000']);
            // $table->string('no_hp_ayah');
            // identitas ibu siswa
            $table->string('nama_ibu');
            $table->string('tempat_lahir_ibu');
            $table->date('tanggal_lahir_ibu');
            $table->enum('hubungan_dengan_siswa_ibu', ['Ibu Kandung', 'Ibu Tiri', 'Ibu Angkat']);
            $table->enum('pendidikan_ibu', ['SD/MI', 'SMP/MTs', 'SMA/SMK/MA', 'Diploma', 'S1', 'S2', 'S3']);
            $table->string('pekerjaan_ibu');
            $table->enum('penghasilan_ibu', ['Kurang dari Rp. 500.000', 'Rp. 500.000 - Rp. 1.000.000', 'Rp. 1.000.000 - Rp. 2.000.000', 'Rp. 2.000.000 - Rp. 3.000.000', 'Lebih Dari Rp. 3.000.000']);
            // $table->string('no_hp_ibu');

            // identitas wali siswa
            $table->string('nama_wali');
            $table->string('tempat_lahir_wali');
            $table->date('tanggal_lahir_wali');
            $table->enum('pendidikan_wali', ['SD/MI', 'SMP/MTs', 'SMA/SMK/MA', 'Diploma', 'S1', 'S2', 'S3']);
            $table->string('pekerjaan_wali');
            $table->enum('penghasilan_wali', ['Kurang dari Rp. 500.000', 'Rp. 500.000 - Rp. 1.000.000', 'Rp. 1.000.000 - Rp. 2.000.000', 'Rp. 2.000.000 - Rp. 3.000.000', 'Lebih Dari Rp. 3.000.000']);
            // $table->string('no_hp_wali');
            // masukkan tahun daftar
            $table->string('tahun_daftar');
            
            // upload berkas
            $table->string('foto_siswa');
            $table->string('kartu_keluarga');
            $table->string('ijazah_sd_mi');
            $table->string('ktp_orang_tua');

            // autentikasi
            $table->string('email')->unique();
            $table->string('no_hp_siswa')->unique();
            $table->string('password');
            $table->string('level');
            // status validasi data
            $table->enum('status_validasi', ['Belum Validasi', 'Sudah Validasi']);
            
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

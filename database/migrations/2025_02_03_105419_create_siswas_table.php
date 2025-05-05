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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->enum('kelas', ['Siswa Baru Kelas 7', 'Siswa Baru Kelas 8', 'Siswa Baru Kelas 9'])->nullable();;
            $table->enum('domisili', ['Mondok', 'Tidak Mondok'])->nullable();;
            // identitas siswa diisi (siswa)
            $table->string('nama_siswa')->nullable();
            $table->string('nisn_siswa')->unique()->nullable();
            $table->string('tempat_lahir')->nullable();;
            $table->date('tanggal_lahir')->nullable();;
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();;
            $table->string('alamat_provinsi')->nullable();;
            $table->string('alamat_kabupaten')->nullable();;
            $table->string('alamat_kecamatan')->nullable();;
            $table->string('alamat_desa')->nullable();;
            $table->string('kode_pos')->nullable();;
            $table->string('anak_ke')->nullable();;
            $table->enum('status_anak', ['Anak Kandung', 'Anak Yatim', 'Anak Piatu', 'Anak Yatim Piatu'])->nullable();;
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Budha', 'Hindu', 'Konghucu'])->nullable();;
            $table->string('no_hp')->nullable();;
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O'])->nullable();;
            $table->string('penyakit_yang_diderita')->nullable();;
            // Riwayat Pendidikan
            $table->string('no_peserta_ujian')->nullable();;
            $table->string('npsn_sekolah_asal')->nullable();;
            $table->string('nama_sekolah_asal')->nullable();;
            $table->string('jenis_sekolah_asal')->nullable();;
            // $table->enum('jenis_sekolah_asal', ['SD', 'MI', 'Paket A', 'SLB'])->nullable();;
            $table->string('alamat_sekolah_provinsi')->nullable();;
            $table->string('alamat_sekolah_kabupaten')->nullable();;
            $table->string('alamat_sekolah_kecamatan')->nullable();;
            $table->string('alamat_sekolah_lengkap')->nullable();;
            // $table->string('no_ijazah_sd')->nullable();;
            // $table->string('no_skhun_sd')->nullable();;
            $table->string('prestasi_yang_diraih')->nullable();;
            // identitas ayah siswa
            $table->string('nama_ayah')->nullable();;
            $table->string('tempat_lahir_ayah')->nullable();;
            $table->date('tanggal_lahir_ayah')->nullable();;
            $table->enum('hubungan_dengan_siswa_ayah', ['Ayah Kandung', 'Ayah Tiri', 'Ayah Angkat'])->nullable();;
            $table->enum('pendidikan_ayah', ['SD/MI', 'SMP/MTs', 'SMA/SMK/MA', 'Diploma', 'S1', 'S2', 'S3'])->nullable();;
            $table->string('pekerjaan_ayah')->nullable();;
            $table->enum('penghasilan_ayah', ['Kurang dari Rp. 500.000', 'Rp. 500.000 - Rp. 1.000.000', 'Rp. 1.000.000 - Rp. 2.000.000', 'Rp. 2.000.000 - Rp. 3.000.000', 'Lebih Dari Rp. 3.000.000'])->nullable();;
            // $table->string('no_hp_ayah')->nullable();;
            // identitas ibu siswa
            $table->string('nama_ibu')->nullable();;
            $table->string('tempat_lahir_ibu')->nullable();;
            $table->date('tanggal_lahir_ibu')->nullable();;
            $table->enum('hubungan_dengan_siswa_ibu', ['Ibu Kandung', 'Ibu Tiri', 'Ibu Angkat'])->nullable();;
            $table->enum('pendidikan_ibu', ['SD/MI', 'SMP/MTs', 'SMA/SMK/MA', 'Diploma', 'S1', 'S2', 'S3'])->nullable();;
            $table->string('pekerjaan_ibu')->nullable();;
            $table->enum('penghasilan_ibu', ['Kurang dari Rp. 500.000', 'Rp. 500.000 - Rp. 1.000.000', 'Rp. 1.000.000 - Rp. 2.000.000', 'Rp. 2.000.000 - Rp. 3.000.000', 'Lebih Dari Rp. 3.000.000'])->nullable();;
            // $table->string('no_hp_ibu')->nullable();;
            // identitas wali siswa
            $table->string('nama_wali')->nullable();;
            $table->string('tempat_lahir_wali')->nullable();;
            $table->date('tanggal_lahir_wali')->nullable();;
            $table->enum('pendidikan_wali', ['SD/MI', 'SMP/MTs', 'SMA/SMK/MA', 'Diploma', 'S1', 'S2', 'S3'])->nullable();;
            $table->string('pekerjaan_wali')->nullable();;
            $table->enum('penghasilan_wali', ['Kurang dari Rp. 500.000', 'Rp. 500.000 - Rp. 1.000.000', 'Rp. 1.000.000 - Rp. 2.000.000', 'Rp. 2.000.000 - Rp. 3.000.000', 'Lebih Dari Rp. 3.000.000'])->nullable();;
            // $table->string('no_hp_wali')->nullable();;
            // masukkan tahun daftar
            // $table->string('tahun_daftar')->nullable();;
            // upload berkas
            $table->string('foto_siswa')->nullable();;
            $table->string('kartu_keluarga')->nullable();;
            $table->string('ijazah_sd_mi')->nullable();;
            $table->string('ktp_orang_tua')->nullable();;
            // autentikasi
            // $table->string('email')->nullable();->unique();
            // $table->string('no_hp_siswa')->unique();
            // $table->string('password');
            // $table->string('level');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // status validasi data
            $table->year('tahun_daftar')->default(date('Y'));
            $table->enum('status_selesai', ['Belum Selesai', 'Sudah Selesai']);
            $table->enum('status_validasi', ['Belum Validasi', 'Sudah Validasi']);
            $table->string('role')->default('siswa'); // Tambahkan role

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};

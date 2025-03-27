<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran SMP Plus AI-Qodiri 1 Jember</title>
</head>

<body>
    <div style="text-align: center;">

        <?php
$path = 'asset/kop.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

            ?>
        <img src="<?php echo $base64 ?>" alt="" width="100%" srcset="">
        <strong>Formulir Pendaftaran</strong>
        <p>Data Siswa SMP Plus AI-Qodiri 1 Jember</p>
        <p>Tahun Pelajaran <?php $tahun = date('Y');
echo $tahun ?>/<?php echo $tahun + 1 ?></p>
    </div>

    <!-- Bagian A: Identitas Siswa (dilisi petugas PPDB) -->
    <div>
        <h4>A. Identitas Siswa (dilisi petugas PPDB)</h4>
        {{-- <p><strong>1. Nis Lokal :</strong> .................................</p> --}}
        <p><strong>1. Kelas :</strong>
            {{ $siswa->kelas }}
        </p>
        <p><strong>2. Domisili :</strong>
            {{ $siswa->domisili }}
        </p>
    </div>

    <!-- Bagian B: Identitas Siswa (dilisi oleh siswa) -->
    <div>
        <h4>B. Identitas Siswa (dilisi oleh siswa)</h4>
        <p><strong>1. Nama Siswa :</strong>
            {{$siswa->nama_siswa}}
        </p>
        <p><strong>2. NISN :</strong>
            {{$siswa->nisn_siswa}}
        </p>
        <p><strong>3. Tempat, Tgl Lahir :</strong>
            {{ $siswa->tempat_lahir }} , {{ $siswa->tanggal_lahir }}
        </p>
        <p><strong>4. Jenis Kelamin :</strong>
            {{ $siswa->jenis_kelamin }}
        </p>
        <p><strong>5. Alamat :</strong></p>
        <p style="margin-left: 20px;"><strong>Desa/Kelurahan :</strong>
            {{ $siswa->nama_desa }}
        </p>
        <p style="margin-left: 20px;"><strong>Kecamatan :</strong>
            {{ $siswa->nama_kecamatan }}
        </p>
        <p style="margin-left: 20px;"><strong>Kabupaten :</strong>
            {{ $siswa->nama_kabupaten }}
        </p>
        <p style="margin-left: 20px;"><strong>Provinsi :</strong>
            {{ $siswa->nama_provinsi }}
        </p>
        {{-- <p style="margin-left: 20px;"><strong>Kode Pos :</strong>
            << Kode Pos>>
        </p> --}}
        {{-- <p><strong>Anak ke :</strong>
            << Anak Ke>>
        </p>
        <p><strong>Jumlah saudara :</strong>
            << Jumlah Saudara>>
        </p> --}}
        <p><strong>6. Status Anak :</strong>
            {{$siswa->status_anak}}
        </p>
        <p><strong>7. Agama :</strong>
            {{$siswa->agama}}
        </p>
        <p><strong>8. Nomor Telp/HP :</strong>
            {{$siswa->no_hp}}
        </p>
        <p><strong>9. Gol. Darah :</strong>
            {{$siswa->golongan_darah}}
        </p>
        <p><strong>10. Penyakit yang pernah diderita :</strong>
            {{ $siswa->penyakit_yang_diderita }}
        </p>
    </div>

    <!-- Bagian C: Riwayat Pendidikan -->
    <div>
        <h4>C. Riwayat Pendidikan</h4>
        <p><strong>1. Nama Sekolah asal:</strong>
            {{$siswa->nama_sekolah_asal}}
        </p>
        <p><strong>2. Jenis Sekolah asal :</strong>
            {{$siswa->jenis_sekolah_asal}}
        </p>
        <p><strong>3. Nomor Peserta Ujian Jenjang SD/MI :</strong>
            {{$siswa->no_peserta_ujian}}
        </p>
        <p><strong>4. NPSN Sekolah asal:</strong>
            {{ $siswa->npsn_sekolah_asal }}
        </p>
        <p><strong>5. Alamat Sekolah asal:</strong></p>
        <p style="margin-left: 20px;"><strong>Alamat Sekolah :</strong>
            {{ $siswa->alamat_sekolah_lengkap }}
        </p>
        <p style="margin-left: 20px;"><strong>Kecamatan :</strong>
            {{$siswa->alamat_sekolah_kecamatan}}
        </p>
        <p style="margin-left: 20px;"><strong>Kabupaten :</strong>
            {{$siswa->alamat_sekolah_kabupaten}}
        </p>
        <p style="margin-left: 20px;"><strong>Provinsi :</strong>
            {{ $siswa->alamat_sekolah_provinsi }}
        </p>
        <p><strong>6. Prestasi yang pernah diraih :</strong>
            {{ $siswa->prestasi_yang_diraih }}
        </p>
    </div>

    <!-- Bagian D: Identitas Orang Tua -->
    <div>
        <h4>D. Identitas Orang Tua</h4>

        <!-- Subbagian D.1: Identitas AYAH -->
        <div style="margin-left: 15px;">
            <h5>D.1. Identitas AYAH</h5>
            <p><strong>1. Nama :</strong>
                {{ $siswa->nama_ayah }}
            </p>
            <p><strong>2. Tempat lahir :</strong>
                {{ $siswa->tempat_lahir_ayah }}
            </p>
            <p><strong>3. Tgl lahir :</strong>
                {{ $siswa->tanggal_lahir_ayah }}
            </p>
            <p><strong>4. Hubungan dengan siswa :</strong>
                {{ $siswa->hubungan_dengan_siswa_ayah }}
            </p>
            <p><strong>5. Pendidikan :</strong>
                {{ $siswa->pendidikan_ayah }}
            </p>
            <p><strong>6. Pekerjaan :</strong>
                {{ $siswa->pekerjaan_ayah }}
            </p>
            <p><strong>7. Penghasilan Perbulan :</strong>
                {{ $siswa->penghasilan_ayah }}
            </p>
        </div>

        <!-- Subbagian D.2: Identitas IBU -->
        <div style="margin-left: 15px;">
            <h5>D.2. Identitas IBU</h5>
            <p><strong>1. Nama :</strong>
                {{ $siswa->nama_ibu }}
            </p>
            <p><strong>2. Tempat Lahir :</strong>
                {{ $siswa->tempat_lahir_ibu }}
            </p>
            <p><strong>3. Tanggal lahir :</strong>
                {{ $siswa->tanggal_lahir_ibu }}
            </p>
            <p><strong>4. Hubungan dengan siswa :</strong>
                {{ $siswa->hubungan_dengan_siswa_ibu }}
            </p>
            <p><strong>5. Pendidikan :</strong>
                {{ $siswa->pendidikan_ibu }}
            </p>
            <p><strong>6. Pekerjaan :</strong>
                {{ $siswa->pekerjaan_ibu }}
            </p>
            <p><strong>7. Penghasilan Perbulan :</strong>
                {{$siswa->penghasilan_ibu}}
            </p>
        </div>

        <!-- Subbagian D.3: Identitas WALI -->
        <div style="margin-left: 15px;">
            <h5>D.3. Identitas WALI</h5>
            <p><strong>1. Nama :</strong>
                {{ $siswa->nama_wali }}
            </p>
            <p><strong>2. Tempat lahir :</strong>
                {{ $siswa->tempat_lahir_wali }}
            </p>
            <p><strong>3. Tanggal lahir :</strong>
                {{ $siswa->tanggal_lahir_wali }}
            </p>
            <p><strong>4. Pendidikan :</strong>
                {{ $siswa->pendidikan_wali }}
            </p>
            <p><strong>5. Pekerjaan :</strong>
                {{ $siswa->pekerjaan_wali }}
            </p>
            <p><strong>6. Penghasilan Perbulan :</strong>
                {{ $siswa->penghasilan_wali }}
        </div>
    </div>
</body>

</html>
<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportSiswa implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    protected $tahun_daftar;
    private $rowNumber = 0;

    public function forYear($year)
    {
        $this->tahun_daftar = $year;
        return $this;
    }

    public function query()
    {
        $query = Siswa::select('siswas.*')
            ->leftJoin('indonesia_provinces as ip', 'siswas.alamat_provinsi', '=', 'ip.code')
            ->leftJoin('indonesia_cities as ic', 'siswas.alamat_kabupaten', '=', 'ic.code')
            ->leftJoin('indonesia_districts as idt', 'siswas.alamat_kecamatan', '=', 'idt.code')
            ->leftJoin('indonesia_villages as iv', 'siswas.alamat_desa', '=', 'iv.code')
            ->addSelect([
                'ip.name as nama_provinsi',
                'ic.name as nama_kabupaten',
                'idt.name as nama_kecamatan',
                'iv.name as nama_desa'
            ]);

        if ($this->tahun_daftar) {
            $query->where('siswas.tahun_daftar', $this->tahun_daftar);
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'No.',
            'Kelas',
            'Domisili',
            'Nama Siswa',
            'NISN',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Provinsi',
            'Kabupaten/Kota',
            'Kecamatan',
            'Desa/Kelurahan',
            'Kode Pos',
            'Anak Ke',
            'Status Anak',
            'Agama',
            'No HP',
            'Golongan Darah',
            'Penyakit Yang Diderita',
            'No Peserta Ujian',
            'NPSN Sekolah Asal',
            'Nama Sekolah Asal',
            'Jenis Sekolah Asal',
            'Alamat Sekolah Provinsi',
            'Alamat Sekolah Kabupaten',
            'Alamat Sekolah Kecamatan',
            'Alamat Sekolah Lengkap',
            'Prestasi Yang Diraih',
            'Nama Ayah',
            'Tempat Lahir Ayah',
            'Tanggal Lahir Ayah',
            'Hubungan Dengan Siswa (Ayah)',
            'Pendidikan Ayah',
            'Pekerjaan Ayah',
            'Penghasilan Ayah',
            'Nama Ibu',
            'Tempat Lahir Ibu',
            'Tanggal Lahir Ibu',
            'Hubungan Dengan Siswa (Ibu)',
            'Pendidikan Ibu',
            'Pekerjaan Ibu',
            'Penghasilan Ibu',
            'Nama Wali',
            'Tempat Lahir Wali',
            'Tanggal Lahir Wali',
            'Pendidikan Wali',
            'Pekerjaan Wali',
            'Penghasilan Wali',
            'Tahun Daftar',
            'Status Selesai',
            'Status Validasi',
            // 'Role'
        ];
    }

    public function map($siswa): array
    {
        $this->rowNumber++;
        return [
            $this->rowNumber,
            $siswa->kelas,
            $siswa->domisili,
            $siswa->nama_siswa,
            $siswa->nisn_siswa,
            $siswa->tempat_lahir,
            $siswa->tanggal_lahir,
            $siswa->jenis_kelamin,
            $siswa->nama_provinsi,
            $siswa->nama_kabupaten,
            $siswa->nama_kecamatan,
            $siswa->nama_desa,
            $siswa->kode_pos,
            $siswa->anak_ke,
            $siswa->status_anak,
            $siswa->agama,
            $siswa->no_hp,
            $siswa->golongan_darah,
            $siswa->penyakit_yang_diderita,
            $siswa->no_peserta_ujian,
            $siswa->npsn_sekolah_asal,
            $siswa->nama_sekolah_asal,
            $siswa->jenis_sekolah_asal,
            $siswa->alamat_sekolah_provinsi,
            $siswa->alamat_sekolah_kabupaten,
            $siswa->alamat_sekolah_kecamatan,
            $siswa->alamat_sekolah_lengkap,
            $siswa->prestasi_yang_diraih,
            $siswa->nama_ayah,
            $siswa->tempat_lahir_ayah,
            $siswa->tanggal_lahir_ayah,
            $siswa->hubungan_dengan_siswa_ayah,
            $siswa->pendidikan_ayah,
            $siswa->pekerjaan_ayah,
            $siswa->penghasilan_ayah,
            $siswa->nama_ibu,
            $siswa->tempat_lahir_ibu,
            $siswa->tanggal_lahir_ibu,
            $siswa->hubungan_dengan_siswa_ibu,
            $siswa->pendidikan_ibu,
            $siswa->pekerjaan_ibu,
            $siswa->penghasilan_ibu,
            $siswa->nama_wali,
            $siswa->tempat_lahir_wali,
            $siswa->tanggal_lahir_wali,
            $siswa->pendidikan_wali,
            $siswa->pekerjaan_wali,
            $siswa->penghasilan_wali,
            $siswa->tahun_daftar,
            $siswa->status_selesai,
            $siswa->status_validasi,
            // $siswa->role
        ];
    }
}

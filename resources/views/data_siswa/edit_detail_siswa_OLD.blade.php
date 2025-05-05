@extends('layout.main')

@section('title', 'Edit/Lihat Detail Siswa - SPMB SMPP Al-Qodiri Jember')

@section('content')
<div class="content-body" style="min-height: 798px;">



            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>
                                    Edit Data Siswa - {{ $siswa->nama_siswa }} - {{ $siswa->tahun_daftar }}
                                </h4>
                                <hr>

                           <div class="row">
                                <div class="col-12 col-md-8">
                                        <div id="accordion-one" class="accordion">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#kelasmasukdomisili" aria-expanded="false" aria-controls="kelasmasukdomisili"><i class="fa" aria-hidden="true"></i>Kelas Masuk dan Domisili</h5>
                                        </div>
                                        <div id="kelasmasukdomisili" class="collapse" data-parent="#accordion-one" style="">
                                            <div class="card-body">

                                                    <form class="form-identitassiswa1" action="{{ route('form_update_identitas', $siswa->id) }} method="post" novalidate="novalidate">
                                                        @csrf
                                                         @method('POST') <!-- This is optional since POST is the default method -->
                                        <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label" for="val-skill">Kelas Masuk <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="kelas_masuk" name="kelas_masuk">
                                                    @if ($siswa->kelas_masuk == null|| '')
                                                    <option value="">Pilih Kelas Masuk</option>
                                                    <option value="Siswa Baru Kelas 7">Siswa Baru Kelas 7</option>
                                                    <option value="Siswa Baru Kelas 8">Siswa Baru Kelas 8</option>
                                                    <option value="Siswa Baru Kelas 9">Siswa Baru Kelas 9</option>
                                                    @elseif ($siswa->kelas_masuk== 'Siswa Baru Kelas 7')
                                                    <option value="Siswa Baru Kelas 7" selected>Siswa Baru Kelas 7</option>
                                                     <option value="Siswa Baru Kelas 8">Siswa Baru Kelas 8</option>
                                                    <option value="Siswa Baru Kelas 9">Siswa Baru Kelas 9</option>
                                                    @elseif ($siswa->kelas_masuk == 'Siswa Baru Kelas 8')
                                                     <option value="Siswa Baru Kelas 7">Siswa Baru Kelas 7</option>
                                                    <option value="Siswa Baru Kelas 8" selected>Siswa Baru Kelas 8</option>
                                                    <option value="Siswa Baru Kelas 9">Siswa Baru Kelas 9</option>
                                                    @else
                                                    <option value="Siswa Baru Kelas 7">Siswa Baru Kelas 7</option>
                                                    <option value="Siswa Baru Kelas 8">Siswa Baru Kelas 8</option>
                                                    <option value="Siswa Baru Kelas 9" selected>Siswa Baru Kelas 9</option>
                                                    @endif
                                                    {{-- <option value="html">HTML</option>
                                                    <option value="css">CSS</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label" for="val-skill">Status Domisili <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="status_domisili" name="status_domisili">
                                                    @if ($siswa->domisili == null || "")
                                                    <option value="">Pilih Domisili</option>
                                                    <option value="Mondok">Mondok</option>
                                                     <option value ="Tidak Mondok">Tidak Mondok</option>
                                                    @elseif($siswa->domisili == 'Tidak Mondok')
                                                     <option selected value="Tidak Mondok">Tidak Mondok</option>
                                                     <option value="Mondok">Mondok</option>
                                                     @else
                                                     <option value ="Tidak Mondok">Tidak Mondok</option>
                                                     <option selected value="Mondok">Mondok</option>
                                                    @endif



                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#identitas_siswa" aria-expanded="false" aria-controls="identitas_siswa"><i class="fa" aria-hidden="true"></i> Identitas Siswa</h5>
                                        </div>
                                        <div id="identitas_siswa" class="collapse" data-parent="#accordion-one">
                                            <div class="card-body">

                                                <form class="form-identitassiswa2" action="{{ route('form_update_identitas_siswa', $siswa->id) }}" method="post" novalidate="novalidate">
                                                    @csrf
                                                        @method('POST') <!-- This is optional since POST is the default method -->
                                         <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Nama Siswa <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukkan Nama Siswa" value="{{$siswa->nama_siswa}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">NISN <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" value="{{$siswa->nisn_siswa}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Tempat Lahir <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{$siswa->tempat_lahir}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Tanggal Lahir <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="date" class="form-control" id="tanggal_lahir_siswa" name="tanggal_lahir_siswa" placeholder="Masukkan Tanggal Lahir" value="{{ $siswa->tanggal_lahir }}">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Jenis Kelamin<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                                    @if ($siswa->jenis_kelamin == null || "")
                                                    <option selected value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                    @elseif($siswa->jenis_kelamin == 'Laki-laki')
                                                     <option value="">Pilih Jenis Kelamin</option>
                                                    <option selected  value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                    @else
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                    <option  value="Laki-laki">Laki-laki</option>
                                                    <option selected  value="Perempuan">Perempuan</option>
                                                    @endif

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Status Anak <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="status_anak" name="status_anak">

                                                    @if ($siswa->status_anak == null || "")
                                                    <option value="">Pilih Status Anak</option>
                                                    <option value="Anak Kandung">Anak Kandung</option>
                                                    <option value="Anak Yatim">Anak Yatim</option>
                                                    <option value="Anak Piatu">Anak Piatu</option>
                                                    <option value="Anak Yatim Piatu">Anak Yatim Piatu</option>
                                                    @elseif($siswa->status_anak == 'Anak Kandung')
                                                     <option value="">Pilih Status Anak</option>
                                                    <option selected value="Anak Kandung">Anak Kandung</option>
                                                    <option value="Anak Yatim">Anak Yatim</option>
                                                    <option value="Anak Piatu">Anak Piatu</option>
                                                    <option value="Anak Yatim Piatu">Anak Yatim Piatu</option>
                                                    @elseif($siswa->status_anak == 'Anak Yatim')
                                                     <option value="">Pilih Status Anak</option>
                                                    <option value="Anak Kandung">Anak Kandung</option>
                                                    <option selected value="Anak Yatim">Anak Yatim</option>
                                                    <option value="Anak Piatu">Anak Piatu</option>
                                                    <option value="Anak Yatim Piatu">Anak Yatim Piatu</option>
                                                    @elseif ($siswa->status_anak == 'Anak Piatu')
                                                     <option value="">Pilih Status Anak</option>
                                                    <option value="Anak Kandung">Anak Kandung</option>
                                                    <option value="Anak Yatim">Anak Yatim</option>
                                                    <option selected value="Anak Piatu">Anak Piatu</option>
                                                    <option value="Anak Yatim Piatu">Anak Yatim Piatu</option>
                                                    @else
                                                     <option value="">Pilih Status Anak</option>
                                                    <option value="Anak Kandung">Anak Kandung</option>
                                                    <option value="Anak Yatim">Anak Yatim</option>
                                                    <option value="Anak Piatu">Anak Piatu</option>
                                                    <option selected value="Anak Yatim Piatu">Anak Yatim Piatu</option>

                                                    @endif

                                                </select>
                                            </div>
                                        </div>

                                    <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Agama<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="agama_siswa" name="agama_siswa">
                                                    @if ($siswa->agama == null||'')
                                                    <option value="">Pilih Agama</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Hindu">Hindu</option>
                                                      <option value="Konghucu">Konghucu</option>
                                                    @elseif($siswa->agama =='Islam')
                                                    <option value="">Pilih Agama</option>
                                                    <option selected value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Hindu">Hindu</option>
                                                      <option value="Konghucu">Konghucu</option>
                                                    @elseif($siswa->agama =='Kristen')
                                                    <option value="">Pilih Agama</option>
                                                    <option value="Islam">Islam</option>
                                                    <option selected value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Hindu">Hindu</option>
                                                      <option value="Konghucu">Konghucu</option>
                                                    @elseif($siswa->agama =='Katolik')
                                                    <option value="">Pilih Agama</option>
                                                    <option value="Islam">Islam</option>
                                                    <option  value="Kristen">Kristen</option>
                                                    <option selected value="Katolik">Katolik</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Hindu">Hindu</option>
                                                      <option value="Konghucu">Konghucu</option>
                                                    @elseif($siswa->agama =='Budha')
                                                    <option value="">Pilih Agama</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option selected value="Budha">Budha</option>
                                                    <option value="Hindu">Hindu</option>
                                                      <option value="Konghucu">Konghucu</option>
                                                    @elseif($siswa->agama =='Hindu')
                                                    <option value="">Pilih Agama</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Budha">Budha</option>
                                                    <option selected value="Hindu">Hindu</option>
                                                      <option value="Konghucu">Konghucu</option>
                                                     @elseif($siswa->agama =='Konghuchu')
                                                    <option value="">Pilih Agama</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option selected value="Konghucu">Konghucu</option>
                                                    {{-- @else --}}
                                                    @endif



                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-currency">No.HP <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No.HP" value={{ $siswa->no_hp }}>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Golongan Darah<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="golda" name="golda">
                                                    @if ($siswa->golongan_darah == null || '')
                                                    <option value="">Pilih Golongan Darah</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="AB">AB</option>
                                                    <option value="O">O</option>
                                                    @elseif($siswa->golongan_darah == 'A')
                                                    <option value="">Pilih Golongan Darah</option>
                                                    <option selected value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="AB">AB</option>
                                                    <option value="O">O</option>
                                                    @elseif($siswa->golongan_darah == 'B')
                                                    <option value="">Pilih Golongan Darah</option>
                                                    <option value="A">A</option>
                                                    <option selected value="B">B</option>
                                                    <option value="AB">AB</option>
                                                    <option value="O">O</option>
                                                    @elseif($siswa->golongan_darah == 'AB')
                                                    <option value="">Pilih Golongan Darah</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option selected value="AB">AB</option>
                                                    <option value="O">O</option>
                                                    @elseif($siswa->golongan_darah == 'O')
                                                    <option value="">Pilih Golongan Darah</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="AB">AB</option>
                                                    <option selected value="O">O</option>

                                                    @endif

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-website">Penyakit Yang Diderita<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="penyakit_siswa" name="penyakit_siswa" placeholder="Masukkan Penyakit Yang Diderita" value={{ $siswa->penyakit_yang_diderita }}>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>


                                     </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#alamat" aria-expanded="false" aria-controls="alamat"><i class="fa" aria-hidden="true"></i>Alamat</h5>
                                        </div>
                                        <div id="alamat" class="collapse" data-parent="#accordion-one">
                                            <div class="card-body">

                                        <form class="form-alamat_siswa" action="{{ route('form_update_alamat_siswa' , $siswa->id) }}" method="post" novalidate="novalidate">
                                            @csrf
                                              @method('POST') <!-- This is optional since POST is the default method -->

                                           <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Provinsi<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="provinsi_siswa" name="provinsi_siswa">
                                                    <option value="">Pilih Provinisi</option>
                                                    {{-- @foreach ($provinsi as $ps)
                                                    <option value="{{$ps->code}}">{{$ps->name}}</option>
                                                    @endforeach --}}

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kabupaten/Kota<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="kabupaten_siswa" name="kabupaten_siswa">
                                                    <option value="">Pilih Kabupaten</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kecamatan<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="kecamatan_siswa" name="kecamatan_siswa">
                                                    <option value="">Pilih Kecamatan</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Desa/Kelurahan<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="desa_kelurahan_siswa" name="desa_kelurahan_siswa">
                                                    <option value="">Pilih Desa/Kelurahan</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>



                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#riwayat_pendidikan" aria-expanded="false" aria-controls="riwayat_pendidikan"><i class="fa" aria-hidden="true"></i> Riwayat Pendidikan</h5>
                                        </div>
                                        <div id="riwayat_pendidikan" class="collapse" data-parent="#accordion-one" style="">
                                            <div class="card-body">
                                                 <form class="form-pendidikan_siswa" action="{{ route('form_update_pendidikan_siswa' , $siswa->id) }}" method="post" novalidate="novalidate">
                                            @csrf
                                              @method('POST') <!-- This is optional since POST is the default method -->

                                           <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                        <div class="form-group row">

                                               <label class="col-lg-4 col-form-label" for="val-username">NPSN <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="npsn_sekolah_asal" name="npsn_sekolah_asal" placeholder="Masukkan NPSN Sekolah" value="{{$siswa->npsn_sekolah_asal}}">
                                                <small> untuk mencari NPSN silakan mencari di website  <a href="https://referensi.data.kemdikbud.go.id/"> referensi.data.kemdikbud.go.id </a>  </small>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Nama Sekolah Asal <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="nama_sekolah_asal" name="nama_sekolah_asal" placeholder="Masukkan Nama Sekolah Asal" value={{$siswa->nama_sekolah_asal}}>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Jenis Sekolah Asal <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="jenis_sekolah_asal" name="jenis_sekolah_asal" placeholder="Masukkan Jenis Sekolah Asal" value="{{$siswa->jenis_sekolah_asal}}">
                                            </div>
                                        </div>

                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Provinsi Sekolah Asal<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="alamat_sekolah_provinsi" name="alamat_sekolah_provinsi" placeholder="Masukkan Provinsi Sekolah Asal" value="{{$siswa->alamat_sekolah_provinsi}}">
                                            </div>
                                        </div>

                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Kabupaten/Kota Sekolah Asal<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="alamat_sekolah_kabupaten" name="alamat_sekolah_kabupaten" placeholder="Masukkan Kabupaten Sekolah Asal" value="{{$siswa->alamat_sekolah_kabupaten}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Kecamatan Sekolah Asal<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="alamat_sekolah_kecamatan" name="alamat_sekolah_kecamatan" placeholder="Masukkan Kecamatan Sekolah Asal" value="{{$siswa->alamat_sekolah_kecamatan}}">
                                            </div>
                                        </div>

                                              <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Alamat Lengkap Sekolah Asal<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="alamat_sekolah_lengkap" name="alamat_sekolah_lengkap" placeholder="Masukkan Alamat Lengkap Sekolah Asal" value="{{$siswa->alamat_sekolah_lengkap}}">
                                            </div>
                                        </div>
                                        <hr>
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">No.Peserta Ujian Jenjang SD/MI
                                            </label>
                                            <div class="col">
                                                <input type="number" class="form-control" id="no_peserta_ujian" name="no_peserta_ujian" placeholder="Masukkan Nomor Peserta Ujian (tidak wajib)" value ="{{$siswa->no_peserta_ujian}}">
                                            </div>
                                        </div>


                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Prestasi yang diraih
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="prestasi_yang_diraih" name="prestasi_yang_diraih" placeholder="Masukkan Prestasi yang diraih (tidak wajib)" value="{{$siswa->prestasi_yang_diraih}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>



                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#identitas_ortu" aria-expanded="false" aria-controls="identitas_ortu"><i class="fa" aria-hidden="true"></i> Identitas Orang Tua</h5>
                                        </div>
                                        <div id="identitas_ortu" class="collapse" data-parent="#accordion-one" style="">
                                            <div class="card-body">
                                            <div class="container">

                                                {{-- formulir edit ayah  --}}

                                              <p class="font-weight-bold">Data Ayah</p>
                                                <div class="form-validation">
                                                <form class="form-ortusiswa" action="{{ route('form_update_ortu_siswa' , $siswa->id) }} method="post" novalidate="novalidate"> @csrf
                                                    @method('POST') <!-- This is optional since POST is the default method -->
                                                    <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-username">Nama Ayah <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah" value="{{$siswa->nama_ayah}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-email">Tempat Lahir Ayah<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" placeholder="Masukkan Tempat Lahir Ayah" value="{{$siswa->tempat_lahir_ayah}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-password">Tanggal Lahir Ayah <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" placeholder="Choose a safe one.." value="{{$siswa->tanggal_lahir_ayah}}">
                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Hubungan dengan siswa<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <select class="form-control" id="hubungan_dengan_siswa_ayah" name="hubungan_dengan_siswa_ayah">

                                                                @if($siswa->hubungan_dengan_siswa_ayah == null || '')
                                                                  <option value="">Pilih Hubungan Dengan Ayah Siswa</option>
                                                                <option value="Ayah Kandung">Ayah Kandung</option>
                                                                <option value="Ayah Tiri">Ayah Tiri</option>
                                                                   <option value="Ayah Angkat">Ayah Angkat</option>
                                                                @elseif($siswa->hubungan_dengan_siswa_ayah == 'Ayah Kandung')
                                                                 <option value="">Pilih Hubungan Dengan Ayah Siswa</option>
                                                                <option selected value="Ayah Kandung">Ayah Kandung</option>
                                                                <option value="Ayah Tiri">Ayah Tiri</option>
                                                                   <option value="Ayah Angkat">Ayah Angkat</option>
                                                                @elseif($siswa->hubungan_dengan_siswa_ayah == 'Ayah Tiri')
                                                                 <option value="">Pilih Hubungan Dengan Ayah Siswa</option>
                                                                <option value="Ayah Kandung">Ayah Kandung</option>
                                                                <option selected value="Ayah Tiri">Ayah Tiri</option>
                                                                   <option value="Ayah Angkat">Ayah Angkat</option>
                                                                @else
                                                                 <option value="">Pilih Hubungan Dengan Ayah Siswa</option>
                                                                <option value="Ayah Kandung">Ayah Kandung</option>
                                                                <option value="Ayah Tiri">Ayah Tiri</option>
                                                                   <option selected value="Ayah Angkat">Ayah Angkat</option>
                                                                @endif

                                                            </select>
                                                        </div>
                                                    </div>
                                                      <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Pendidikan<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <select class="form-control" id="pendidikan_ayah" name="pendidikan_ayah">

                                                           @if($siswa->pendidikan_ayah == null || '')
                                                                 <option value="">Pilih Pendidikan Ayah Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_ayah == 'SD/MI')
                                                              <option value="">Pilih Pendidikan Ayah Siswa</option>
                                                                <option selected value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_ayah == 'SMP/MTs')
                                                              <option value="">Pilih Pendidikan Ayah Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option selected value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_ayah == 'SMA/SMK/MA')
                                                              <option value="">Pilih Pendidikan Ayah Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option selected value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_ayah == 'Diploma')
                                                              <option value="">Pilih Pendidikan Ayah Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option selected value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_ayah == 'S1')
                                                              <option value="">Pilih Pendidikan Ayah Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option selected value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                            @elseif($siswa->pendidikan_ayah == 'S2')
                                                               <option value="">Pilih Pendidikan Ayah Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option selected value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                            @elseif($siswa->pendidikan_ayah == 'S3')
                                                               <option value="">Pilih Pendidikan Ayah Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option selected value="S3">S3</option>
                                                           @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-currency">Pekerjaan Ayah <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah" value="{{$siswa->pekerjaan_ayah}}">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Penghasilan Ayah<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">

                                                            <select class="form-control" id="penghasilan_ayah" name="penghasilan_ayah">

                                                                @if($siswa->penghasilan_ayah == null ||'')
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_ayah == 'Kurang dari Rp. 500.000')
                                                                    <option value="">Please select</option>
                                                                <option selected value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_ayah == 'Rp. 500.000 - Rp. 1.000.000')
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_ayah == 'Rp. 1.000.000 - Rp. 2.000.000')
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_ayah == 'Rp. 2.000.000 - Rp. 3.000.000')
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_ayah == 'Lebih Dari Rp. 3.000.000' )
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @endif

                                                            </select>
                                                        </div>
                                                    </div>
                                                        {{-- formulir data ibu --}}
                                                    <hr>
                                                       <p class="font-weight-bold">Data Ibu</p>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-username">Nama Ibu <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu" value="{{$siswa->nama_ibu}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-email">Tempat Lahir Ibu<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" placeholder="Masukkan Tempat Lahir Ibu" value="{{$siswa->tempat_lahir_ibu}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-password">Tanggal Lahir Ibu <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="date" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" placeholder="Choose a safe one.."value={{$siswa->tanggal_lahir_ibu}}>
                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Hubungan dengan siswa<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <select class="form-control" id="hubungan_dengan_siswa_ibu" name="hubungan_dengan_siswa_ibu">


                                                                  @if($siswa->hubungan_dengan_siswa_ibu == null || '')
                                                                  <option value="">Pilih Hubungan Dengan Ibu Siswa</option>
                                                                <option value="Ibu Kandung">Ibu Kandung</option>
                                                                <option value="Ibu Tiri">Ibu Tiri</option>
                                                                   <option value="Ibu Angkat">Ibu Angkat</option>
                                                                @elseif($siswa->hubungan_dengan_siswa_ibu == 'Ibu Kandung')
                                                                 <option value="">Pilih Hubungan Dengan Ibu Siswa</option>
                                                                <option selected value="Ibu Kandung">Ibu Kandung</option>
                                                                <option value="Ibu Tiri">Ibu Tiri</option>
                                                                   <option value="Ibu Angkat">Ibu Angkat</option>
                                                                @elseif($siswa->hubungan_dengan_siswa_ibu == 'Ibu Tiri')
                                                                 <option value="">Pilih Hubungan Dengan Ibu Siswa</option>
                                                                <option value="Ibu Kandung">Ibu Kandung</option>
                                                                <option selected value="Ibu Tiri">Ibu Tiri</option>
                                                                   <option value="Ibu Angkat">Ibu Angkat</option>
                                                                @else
                                                                 <option value="">Pilih Hubungan Dengan Ibu Siswa</option>
                                                                <option value="Ibu Kandung">Ibu Kandung</option>
                                                                <option value="Ibu Tiri">Ibu Tiri</option>
                                                                   <option selected value="Ibu Angkat">Ibu Angkat</option>
                                                                @endif


                                                            </select>
                                                        </div>
                                                    </div>
                                                      <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Pendidikan<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <select class="form-control" id="pendidikan_ibu" name="pendidikan_ibu">
                                                                 @if($siswa->pendidikan_ibu == null || '')
                                                                 <option value="">Pilih Pendidikan Ibu Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_ibu == 'SD/MI')
                                                              <option value="">Pilih Pendidikan Ibu Siswa</option>
                                                                <option selected value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_ibu == 'SMP/MTs')
                                                              <option value="">Pilih Pendidikan Ibu Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option selected value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_ibu == 'SMA/SMK/MA')
                                                              <option value="">Pilih Pendidikan Ibu Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option selected value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_ibu == 'Diploma')
                                                              <option value="">Pilih Pendidikan Ibu Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option selected value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_ibu == 'S1')
                                                              <option value="">Pilih Pendidikan Ibu Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option selected value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                            @elseif($siswa->pendidikan_ibu == 'S2')
                                                               <option value="">Pilih Pendidikan Ibu Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option selected value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                            @elseif($siswa->pendidikan_ibu == 'S3')
                                                               <option value="">Pilih Pendidikan Ibu Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option selected value="S3">S3</option>
                                                           @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-currency">Pekerjaan Ibu <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu" value={{$siswa->pekerjaan_ibu}}>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Penghasilan Ibu<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <select class="form-control" id="penghasilan_ibu" name="penghasilan_ibu">

                                                                @if($siswa->penghasilan_ibu == null ||'')
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_ibu == 'Kurang dari Rp. 500.000')
                                                                    <option value="">Please select</option>
                                                                <option selected value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_ibu == 'Rp. 500.000 - Rp. 1.000.000')
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option selected value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_ibu == 'Rp. 1.000.000 - Rp. 2.000.000')
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option selected value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_ibu == 'Rp. 2.000.000 - Rp. 3.000.000')
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option selected value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_ibu == 'Lebih Dari Rp. 3.000.000' )
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option selected value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-8 ml-auto">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>







                                            </div>


                                           </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#identitas_wali" aria-expanded="false" aria-controls="identitas_wali"><i class="fa" aria-hidden="true"></i> Identitas Wali</h5>
                                        </div>
                                        <div id="identitas_wali" class="collapse" data-parent="#accordion-one" style="">
                                            <div class="card-body">


                                                <div class="container">

                                                {{-- formulir edit ayah  --}}

                                              {{-- <p class="font-weight-bold">Data Ayah</p> --}}
                                                <div class="form-validation">
                                                <form class="form-walisiswa" action="{{ route('form_update_wali_siswa' , $siswa->id) }} method="post" novalidate="novalidate"> @csrf
                                                    @method('POST') <!-- This is optional since POST is the default method -->
                                                    <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-username">Nama Wali <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="nama_wali" name="nama_wali" placeholder="Masukkan Nama wali" value="{{$siswa->nama_wali}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-email">Tempat Lahir Wali<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="tempat_lahir_wali" name="tempat_lahir_wali" placeholder="Masukkan Tempat Lahir Wali" value="{{$siswa->tempat_lahir_wali}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-password">Tanggal Lahir Wali <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="date" class="form-control" id="tanggal_lahir_wali" name="tanggal_lahir_wali" placeholder="Choose a safe one.." value="{{$siswa->tanggal_lahir_wali}}">
                                                        </div>
                                                    </div>

                                                      <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Pendidikan<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <select class="form-control" id="pendidikan_wali" name="pendidikan_wali">

                                                           @if($siswa->pendidikan_wali == null || '')
                                                                 <option value="">Pilih Pendidikan Wali Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_wali == 'SD/MI')
                                                              <option value="">Pilih Pendidikan Wali Siswa</option>
                                                                <option selected value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_wali == 'SMP/MTs')
                                                              <option value="">Pilih Pendidikan Wali Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option selected value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_wali == 'SMA/SMK/MA')
                                                              <option value="">Pilih Pendidikan Wali Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option selected value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_wali == 'Diploma')
                                                              <option value="">Pilih Pendidikan Wali Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option selected value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                           @elseif($siswa->pendidikan_wali == 'S1')
                                                              <option value="">Pilih Pendidikan Wali Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option selected value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                            @elseif($siswa->pendidikan_wali == 'S2')
                                                               <option value="">Pilih Pendidikan Wali Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option selected value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                            @elseif($siswa->pendidikan_wali == 'S3')
                                                               <option value="">Pilih Pendidikan Wali Siswa</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTs">SMP/MTs</option>
                                                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option selected value="S3">S3</option>
                                                           @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-currency">Pekerjaan Wali <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali" placeholder="Masukkan Pekerjaan Wali" value="{{$siswa->pekerjaan_wali}}">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Penghasilan Wali<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">

                                                            <select class="form-control" id="penghasilan_wali" name="penghasilan_wali">

                                                                @if($siswa->penghasilan_wali == null ||'')
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_wali == 'Kurang dari Rp. 500.000')
                                                                    <option value="">Please select</option>
                                                                <option selected value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_wali == 'Rp. 500.000 - Rp. 1.000.000')
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_wali == 'Rp. 1.000.000 - Rp. 2.000.000')
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_wali == 'Rp. 2.000.000 - Rp. 3.000.000')
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @elseif($siswa->penghasilan_wali == 'Lebih Dari Rp. 3.000.000' )
                                                                    <option value="">Please select</option>
                                                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                                <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp. 3.000.000</option>
                                                                @endif

                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-lg-8 ml-auto">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>





                                              </div>
                                        </div>
                                    </div>
                                </div>
    </div>
    <div class="col">
    <div class="card" style="width: 18rem;">
                                    <img class="img-fluid"  src="https://natusi.co.id/assets/img/teams/Foto_Dwi%20Silfia%20Anggraini_22112024.png" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $siswa->nama_siswa }}</h5>
                                        <p class="card-text">This is a wider card with supporting text and below as a natural lead-in to the additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                                    </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>


        {{-- load JQUERY --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


{{-- API sekolah indonesia --}}



<script>
    $(document).ready(function() {
        // Ambil nilai NPSN dari input
        const npsn = $('#npsn_sekolah_asal').val();

        // Jika NPSN sudah terisi, langsung ambil data dari API
        if (npsn) {
            const apiUrl = `https://api-sekolah-indonesia.vercel.app/sekolah?npsn=${npsn}`;

            // Lakukan request ke API
            $.ajax({
                url: apiUrl,
                method: 'GET',
                success: function(response) {
                    if (response.status === 'success' && response.dataSekolah.length > 0) {
                        const sekolah = response.dataSekolah[0]; // Ambil data pertama

                        // Isi data ke inputan
                        $('#nama_sekolah_asal').val(sekolah.sekolah);
                        $('#jenis_sekolah_asal').val(sekolah.bentuk);
                        $('#alamat_sekolah_provinsi').val(sekolah.propinsi);
                        $('#alamat_sekolah_kabupaten').val(sekolah.kabupaten_kota);
                        $('#alamat_sekolah_kecamatan').val(sekolah.kecamatan);
                        $('#alamat_sekolah_lengkap').val(sekolah.alamat_jalan);
                    } else {
                        // alert('Sekolah dengan NPSN tersebut tidak ditemukan.');
                    }
                },
                error: function() {
                    // alert('Terjadi kesalahan saat mengambil data dari API.');
                }
            });
        }

        // Event ketika input NPSN kehilangan fokus (blur)
        $('#npsn_sekolah_asal').on('blur', function() {
            const npsnBaru = $(this).val(); // Ambil nilai NPSN yang baru

            // Jika NPSN baru terisi, ambil data dari API
            if (npsnBaru) {
                const apiUrl = `https://api-sekolah-indonesia.vercel.app/sekolah?npsn=${npsnBaru}`;

                // Lakukan request ke API
                $.ajax({
                    url: apiUrl,
                    method: 'GET',
                    success: function(response) {
                        if (response.status === 'success' && response.dataSekolah.length > 0) {
                            const sekolah = response.dataSekolah[0]; // Ambil data pertama

                            // Isi data ke inputan
                            $('#nama_sekolah_asal').val(sekolah.sekolah);
                            $('#jenis_sekolah_asal').val(sekolah.bentuk);
                            $('#alamat_sekolah_provinsi').val(sekolah.propinsi);
                            $('#alamat_sekolah_kabupaten').val(sekolah.kabupaten_kota);
                            $('#alamat_sekolah_kecamatan').val(sekolah.kecamatan);
                            $('#alamat_sekolah_lengkap').val(sekolah.alamat_jalan);
                        } else {
                            // alert('Sekolah dengan NPSN tersebut tidak ditemukan.');
                        }
                    },
                    error: function() {
                        // alert('Terjadi kesalahan saat mengambil data dari API.');
                    }
                });
            } else {
                // alert('Silakan masukkan NPSN.');
            }
        });
    });
</script>


{{-- API sekolah indonesia --}}


{{-- JQUERY EDIT DATA ALAMAT --}}



<script>
    $(document).ready(function() {
        // Fetch provinces
        $.get('/get-provinces', function(data) {
            $.each(data, function(key, value) {
                var selected = (value.code == '{{ $siswa->alamat_provinsi }}') ? 'selected' : '';
                $('#provinsi_siswa').append('<option value="' + value.code + '" ' + selected + '>' + value.name + '</option>');
            });

            // Trigger change event to load cities if province is already selected
            if ('{{ $siswa->alamat_provinsi }}') {
                $('#provinsi_siswa').trigger('change');
            }
        });

        // Province change event
        $('#provinsi_siswa').change(function() {
            var province_id = $(this).val();
            $('#kabupaten_siswa').empty().append('<option value="">Please select</option>');
            $('#kecamatan_siswa').empty().append('<option value="">Please select</option>');
            $('#desa_kelurahan_siswa').empty().append('<option value="">Please select</option>');

            if (province_id) {
                $.get('/get-cities?province_code=' + province_id, function(data) {
                    $.each(data, function(key, value) {
                        var selected = (value.code == '{{ $siswa->alamat_kabupaten }}') ? 'selected' : '';
                        $('#kabupaten_siswa').append('<option value="' + value.code + '" ' + selected + '>' + value.name + '</option>');
                    });

                    // Trigger change event to load districts if city is already selected
                    if ('{{ $siswa->alamat_kabupaten }}') {
                        $('#kabupaten_siswa').trigger('change');
                    }
                });
            }
        });

        // City change event
        $('#kabupaten_siswa').change(function() {
            var city_id = $(this).val();
            $('#kecamatan_siswa').empty().append('<option value="">Please select</option>');
            $('#desa_kelurahan_siswa').empty().append('<option value="">Please select</option>');

            if (city_id) {
                $.get('/get-districts?city_code=' + city_id, function(data) {
                    $.each(data, function(key, value) {
                        var selected = (value.code == '{{ $siswa->alamat_kecamatan }}') ? 'selected' : '';
                        $('#kecamatan_siswa').append('<option value="' + value.code + '" ' + selected + '>' + value.name + '</option>');
                    });

                    // Trigger change event to load villages if district is already selected
                    if ('{{ $siswa->alamat_kecamatan }}') {
                        $('#kecamatan_siswa').trigger('change');
                    }
                });
            }
        });

        // District change event
        $('#kecamatan_siswa').change(function() {
            var district_id = $(this).val();
            $('#desa_kelurahan_siswa').empty().append('<option value="">Please select</option>');

            if (district_id) {
                $.get('/get-villages?district_code=' + district_id, function(data) {
                    $.each(data, function(key, value) {
                        var selected = (value.code == '{{ $siswa->alamat_desa }}') ? 'selected' : '';
                        $('#desa_kelurahan_siswa').append('<option value="' + value.code + '" ' + selected + '>' + value.name + '</option>');
                    });
                });
            }
        });
    });
</script>



{{-- JQUERY EDIT DATA ALAMAT --}}


{{-- kirim formulir per-module jquery --}}

{{-- kirim identitas siswa --}}

<script>
$(document).ready(function() {
    $('form.form-identitassiswa1').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: $(this).attr('action'), // Use the form's action attribute
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
            },
            success: function(response) {
                // Display success notification
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                // Display error notification
                toastr.error('An error occurred while updating the data.');
            }
        });
    });
});
</script>
{{-- kirim identitas siswa --}}


{{-- kirim identitas lengkap siswa --}}
<script>
  $(document).ready(function() {
    $('form.form-identitassiswa2').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: $(this).attr('action'), // Use the form's action attribute
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
            },
            success: function(response) {
                // Display success notification
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                // Display error notification
                toastr.error('An error occurred while updating the data.');
            }
        });
    });
});


    </script>
{{-- kirim identitas lengkap siswa --}}
{{-- kirim alamat siswa --}}
<script>
  $(document).ready(function() {
    $('form.form-alamat_siswa').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: $(this).attr('action'), // Use the form's action attribute
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
            },
            success: function(response) {
                // Display success notification
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                // Display error notification
                toastr.error('An error occurred while updating the data.');
            }
        });
    });
});


    </script>


{{-- kirim alamat siswa --}}


{{-- kirim riwayat pendidikan --}}
<script>
  $(document).ready(function() {
    $('form.form-pendidikan_siswa').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: $(this).attr('action'), // Use the form's action attribute
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
            },
            success: function(response) {
                // Display success notification
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                // Display error notification
                toastr.error('An error occurred while updating the data.');
            }
        });
    });
});


    </script>


{{-- kirim riwayat pendidikan --}}

{{-- identitas ortu --}}
<script>
  $(document).ready(function() {
    $('form.form-ortusiswa').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: $(this).attr('action'), // Use the form's action attribute
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
            },
            success: function(response) {
                // Display success notification
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                // Display error notification
                toastr.error('An error occurred while updating the data.');
            }
        });
    });
});


    </script>

{{-- identitas ortu --}}


{{-- identitas wali --}}

<script>
  $(document).ready(function() {
    $('form.form-walisiswa').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: $(this).attr('action'), // Use the form's action attribute
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
            },
            success: function(response) {
                // Display success notification
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                // Display error notification
                toastr.error('An error occurred while updating the data.');
            }
        });
    });
});


    </script>


{{-- identitas wali --}}



{{-- kirim formulir per-module jquery --}}





@endsection

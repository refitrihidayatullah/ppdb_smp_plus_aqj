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
                                    Edit Data Siswa
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

                                                    <form class="form-valide" action="#" method="post" novalidate="novalidate">

                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label" for="val-skill">Kelas Masuk <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="kelas_masuk" name="kelas_masuk">
                                                    @if ($siswa->kelas_masuk == 'null'|| '')
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
                                                    @elseif($siswa->domisili == 'Tidak Mondok')
                                                     <option selected value="Tidak Mondok">Tidak Mondok</option>
                                                     <option value="Mondok">Mondok</option>
                                                     @else
                                                     <option selected ="Tidak Mondok">Tidak Mondok</option>
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

                                                <form class="form-valide" action="#" method="post" novalidate="novalidate">
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
                                                    @if ($siswa->jenis_kelamin == 'null' || "")
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

                                        <form class="form-valide" action="#" method="post" novalidate="novalidate">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Provinsi<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="provinsi_siswa" name="provinsi_siswa">
                                                    <option value="">Please select</option>
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
                                                    <option value="">Please select</option>
                                                    <option value="html">HTML</option>
                                                    <option value="css">CSS</option>
                                                    <option value="javascript">JavaScript</option>
                                                    <option value="angular">Angular</option>
                                                    <option value="angular">React</option>
                                                    <option value="vuejs">Vue.js</option>
                                                    <option value="ruby">Ruby</option>
                                                    <option value="php">PHP</option>
                                                    <option value="asp">ASP.NET</option>
                                                    <option value="python">Python</option>
                                                    <option value="mysql">MySQL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kecamatan<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="kecamatan_siswa" name="kecamatan_siswa">
                                                    <option value="">Please select</option>
                                                    <option value="html">HTML</option>
                                                    <option value="css">CSS</option>
                                                    <option value="javascript">JavaScript</option>
                                                    <option value="angular">Angular</option>
                                                    <option value="angular">React</option>
                                                    <option value="vuejs">Vue.js</option>
                                                    <option value="ruby">Ruby</option>
                                                    <option value="php">PHP</option>
                                                    <option value="asp">ASP.NET</option>
                                                    <option value="python">Python</option>
                                                    <option value="mysql">MySQL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Desa/Kelurahan<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="desa_kelurahan_siswa" name="desa_kelurahan_siswa">
                                                    <option value="">Please select</option>
                                                    <option value="html">HTML</option>
                                                    <option value="css">CSS</option>
                                                    <option value="javascript">JavaScript</option>
                                                    <option value="angular">Angular</option>
                                                    <option value="angular">React</option>
                                                    <option value="vuejs">Vue.js</option>
                                                    <option value="ruby">Ruby</option>
                                                    <option value="php">PHP</option>
                                                    <option value="asp">ASP.NET</option>
                                                    <option value="python">Python</option>
                                                    <option value="mysql">MySQL</option>
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
                                                    <form class="form-valide" action="#" method="post" novalidate="novalidate">
                                        <div class="form-group row">

                                               <label class="col-lg-4 col-form-label" for="val-username">NPSN <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="npsn_sekolah" name="npsn_sekolah" placeholder="Masukkan NPSN Sekolah" value="{{$siswa->npsn_sekolah_asal}}">
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
                                                <input type="number" class="form-control" id="no_peserta_ujian" name="no_peserta_ujian" placeholder="Masukkan Nomor Peserta Ujian (tidak wajib)">
                                            </div>
                                        </div>


                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Prestasi yang diraih
                                            </label>
                                            <div class="col">
                                                <input type="number" class="form-control" id="prestasi_yang_diraih" name="prestasi_yang_diraih" placeholder="Masukkan Prestasi yang diraih (tidak wajib)">
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
                                                <form class="form-valide" action="#" method="post" novalidate="novalidate">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-username">Nama Ayah <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-email">Tempat Lahir Ayah<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" placeholder="Masukkan Tempat Lahir Ayah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-password">Tanggal Lahir Ayah <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" placeholder="Choose a safe one..">
                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Hubungan dengan siswa<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <select class="form-control" id="hubungan_dengan_siswa_ayah" name="hubungan_dengan_siswa_ayah">
                                                                <option value="">Please select</option>
                                                                <option value="html">HTML</option>
                                                                <option value="css">CSS</option>
                                                                <option value="javascript">JavaScript</option>
                                                                <option value="angular">Angular</option>
                                                                <option value="angular">React</option>
                                                                <option value="vuejs">Vue.js</option>
                                                                <option value="ruby">Ruby</option>
                                                                <option value="php">PHP</option>
                                                                <option value="asp">ASP.NET</option>
                                                                <option value="python">Python</option>
                                                                <option value="mysql">MySQL</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                      <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Pendidikan<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <select class="form-control" id="pendidikan_ayah" name="pendidikan_ayah">
                                                                <option value="">Please select</option>
                                                                <option value="html">HTML</option>
                                                                <option value="css">CSS</option>
                                                                <option value="javascript">JavaScript</option>
                                                                <option value="angular">Angular</option>
                                                                <option value="angular">React</option>
                                                                <option value="vuejs">Vue.js</option>
                                                                <option value="ruby">Ruby</option>
                                                                <option value="php">PHP</option>
                                                                <option value="asp">ASP.NET</option>
                                                                <option value="python">Python</option>
                                                                <option value="mysql">MySQL</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-currency">Pekerjaan Ayah <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Penghasilan Ayah<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <select class="form-control" id="penghasilan_ayah" name="penghasilan_ayah">
                                                                <option value="">Please select</option>
                                                                <option value="html">HTML</option>
                                                                <option value="css">CSS</option>
                                                                <option value="javascript">JavaScript</option>
                                                                <option value="angular">Angular</option>
                                                                <option value="angular">React</option>
                                                                <option value="vuejs">Vue.js</option>
                                                                <option value="ruby">Ruby</option>
                                                                <option value="php">PHP</option>
                                                                <option value="asp">ASP.NET</option>
                                                                <option value="python">Python</option>
                                                                <option value="mysql">MySQL</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                       <p class="font-weight-bold">Data Ibu</p>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-username">Nama Ibu <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-email">Tempat Lahir Ayah<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" placeholder="Masukkan Tempat Lahir Ayah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-password">Tanggal Lahir Ayah <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" placeholder="Choose a safe one..">
                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Hubungan dengan siswa<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <select class="form-control" id="hubungan_dengan_siswa_ayah" name="hubungan_dengan_siswa_ayah">
                                                                <option value="">Please select</option>
                                                                <option value="html">HTML</option>
                                                                <option value="css">CSS</option>
                                                                <option value="javascript">JavaScript</option>
                                                                <option value="angular">Angular</option>
                                                                <option value="angular">React</option>
                                                                <option value="vuejs">Vue.js</option>
                                                                <option value="ruby">Ruby</option>
                                                                <option value="php">PHP</option>
                                                                <option value="asp">ASP.NET</option>
                                                                <option value="python">Python</option>
                                                                <option value="mysql">MySQL</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                      <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Pendidikan<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <select class="form-control" id="pendidikan_ayah" name="pendidikan_ayah">
                                                                <option value="">Please select</option>
                                                                <option value="html">HTML</option>
                                                                <option value="css">CSS</option>
                                                                <option value="javascript">JavaScript</option>
                                                                <option value="angular">Angular</option>
                                                                <option value="angular">React</option>
                                                                <option value="vuejs">Vue.js</option>
                                                                <option value="ruby">Ruby</option>
                                                                <option value="php">PHP</option>
                                                                <option value="asp">ASP.NET</option>
                                                                <option value="python">Python</option>
                                                                <option value="mysql">MySQL</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-currency">Pekerjaan Ayah <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Penghasilan Ayah<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col">
                                                            <select class="form-control" id="penghasilan_ayah" name="penghasilan_ayah">
                                                                <option value="">Please select</option>
                                                                <option value="html">HTML</option>
                                                                <option value="css">CSS</option>
                                                                <option value="javascript">JavaScript</option>
                                                                <option value="angular">Angular</option>
                                                                <option value="angular">React</option>
                                                                <option value="vuejs">Vue.js</option>
                                                                <option value="ruby">Ruby</option>
                                                                <option value="php">PHP</option>
                                                                <option value="asp">ASP.NET</option>
                                                                <option value="python">Python</option>
                                                                <option value="mysql">MySQL</option>
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
                                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</div>
                                        </div>
                                    </div>
                                </div>
    </div>
    <div class="col">
      2 of 2
    </div>
  </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>

{{-- JQUERY UNTUK LARAVOLT  --}}
{{--
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Fetch provinces
            $.get('/get-provinces', function(data) {
                $.each(data, function(key, value) {
                    $('#provinsi_siswa').append('<option value="' + value.code + '">' + value.name + '</option>');
                });
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

                            $('#kabupaten_siswa').append('<option value="' + value.code + '">' + value.name + '</option>');
                        });
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
                            $('#kecamatan_siswa').append('<option value="' + value.code + '">' + value.name + '</option>');
                        });
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
                            $('#desa_kelurahan_siswa').append('<option value="' + value.code + '">' + value.name + '</option>');
                        });
                    });
                }
            });
        });
    </script>

JQUERY UNTUK LARAVOLT  --}}


{{-- API sekolah indonesia --}}


{{-- API sekolah indonesia --}}


{{-- JQUERY EDIT DATA ALAMAT --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
{{-- kirim identitas siswa --}}

{{-- kirim identitas lengkap siswa --}}
{{-- kirim identitas lengkap siswa --}}

{{-- kirim riwayat pendidikan --}}
{{-- kirim riwayat pendidikan --}}

{{-- identitas ayah --}}
{{-- identitas ayah --}}


{{-- identitas ibu --}}
{{-- identitas ibu --}}


{{-- identitas wali --}}
{{-- identitas wali --}}



{{-- kirim formulir per-module jquery --}}





@endsection

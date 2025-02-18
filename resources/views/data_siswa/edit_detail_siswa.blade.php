@extends('layout.main')

@section('title', 'Tambah Akun Siswa - SPMB SMPP Al-Qodiri Jember')

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
                                                <select class="form-control" id="val-skill" name="val-skill">
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
                                            <label class="col-md-4 col-form-label" for="val-skill">Status Domisili <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="val-skill" name="val-skill">
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
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#identitas_siswa" aria-expanded="false" aria-controls="identitas_siswa"><i class="fa" aria-hidden="true"></i> Identitas Siswa</h5>
                                        </div>
                                        <div id="identitas_siswa" class="collapse" data-parent="#accordion-one">
                                            <div class="card-body">

                                                <form class="form-valide" action="#" method="post" novalidate="novalidate">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Nama Siswa <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukkan Nama Siswa">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">NISN <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Tempat Lahir <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Tanggal Lahir <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="date" class="form-control" id="tanggal_lahir_siswa" name="tanggal_lahir_siswa" placeholder="Masukkan Tanggal Lahir">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Jenis Kelamin<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
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
                                            <label class="col-lg-4 col-form-label" for="val-skill">Status Anak <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="status_anak" name="status_anak">
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
                                            <label class="col-lg-4 col-form-label" for="val-skill">Agama<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="agama_siswa" name="agama_siswa">
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
                                        <label class="col-lg-4 col-form-label" for="val-currency">No.HP <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No.HP">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Golongan Darah<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <select class="form-control" id="golongan_darah" name="golongan_darah">
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
                                            <label class="col-lg-4 col-form-label" for="val-website">Penyakit Yang Diderita<span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="penyakit_siswa" name="penyakit_siswa" placeholder="Masukkan Penyakit Yang Diderita">
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
                                                <input type="text" class="form-control" id="npsn_sekolah" name="npsn_sekolah" placeholder="Enter a username..">
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Username <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Enter a username..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Username <span class="text-danger">*</span>
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Enter a username..">
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
                                             <p class="fw-bold">Data Ayah</p>





                                             <p class="fw-bold">Data Ibu</p>
                                                
                                                
                                                
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</div>
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



@endsection

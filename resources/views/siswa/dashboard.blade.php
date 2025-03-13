@extends('layout.main_siswa')

@section('title', 'SPMB SMPP Al-Qodiri Jember')

@section('content')

    <style>
        /* Media Query untuk tampilan mobile */
        @media (max-width: 767.98px) {
            .nav-tabs {
                display: none;
                /* Sembunyikan tab pada tampilan mobile */
            }

            .tab-content {
                display: none;
                /* Sembunyikan tab pada tampilan mobile */
            }

            .accordion {
                display: block;
                /* Tampilkan accordion pada tampilan mobile */
            }
        }

        @media (min-width: 768px) {
            .accordion {
                display: none;
                /* Sembunyikan accordion pada tampilan desktop */
            }
        }
    </style>




    {{-- set background --}}
    <div style="background-color: #022377">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary.bg-gradient bg-body-tertiary">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Toggle button -->
                <button data-mdb-collapse-init class="navbar-toggler" type="button"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-2 mt-lg-0" href="#">
                        <img src="{{ asset('landing-page/img/logo-smp.png') }}" width="50px" alt="SMPPAQJ" loading="lazy" />
                        <a class="navbar-brand fw-bold" href="#">SPMB SMP Plus Al-Qodiri Jember</a>

                    </a>
                    <!-- Left links -->
                    {{-- <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-3 fst-normal">
                            <a class="nav-link active" aria-current="page" href="#beranda">Beranda</a>
                        </li>
                        <li class="nav-item mx-3 fst-normal">
                            <a class="nav-link" href="#tentang-kami">Tentang Kami</a>
                        </li>
                        <li class="nav-item mx-3 fst-normal">
                            <a class="nav-link" href="#alur-pendaftaran">Alur Pendaftaran</a>
                        </li>
                        <li class="nav-item mx-3 fst-normal">
                            <a class="nav-link" href="#kontak-kami">Kontak Kami</a>
                        </li>
                    </ul> --}}
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    <!-- Login -->

                    <a class="nav-link me-2" href="#">{{ Auth::guard('siswa')->user()->nama_siswa }}
                        | {{ Auth::guard('siswa')->user()->tahun_daftar }} </a>

                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                    {{--
                    <a class="text-reset me-3" href="#">
                        <i class="fas fa-shopping-cart"></i>
                    </a> --}}

                </div>
                <!-- Right elements -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->

        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between align-items-center flex-column flex-md-row">
                        <!-- Kolom untuk gambar dan nama siswa -->
                        <div class="col-12 col-md-4 d-flex align-items-center mb-3 mb-md-0">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/047.webp" class="img-fluid"
                                style="border-radius: 50%; width: 80px; height: 80px; object-fit: cover; margin-right: 10px;"
                                alt="Townhouses and Skyscrapers" />
                            <div>
                                <p class="fw-bold m-0">{{ $siswa->nama_siswa }}</p>
                                @if($siswa->status_selesai == 'Belum Selesai')
                                    <span class="badge bg-danger">Belum Selesai</span>
                                @else
                                    <span class="badge bg-success">Sudah Selesai</span>
                                @endif
                            </div>
                        </div>

                        <!-- Kolom untuk tombol download -->
                        <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-end">
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init>Download Formulir</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="row w-100">
                        <div class="col-3">
                            <!-- Tab navs -->
                            <div class="nav flex-column nav-tabs text-center" id="v-tabs-tab" role="tablist"
                                aria-orientation="vertical">
                                <a data-mdb-tab-init class="nav-link active" id="v-tabs-home-tab" href="#v-tabs-domisili"
                                    role="tab" aria-controls="v-tabs-home" aria-selected="true">Domisili</a>
                                <a data-mdb-tab-init class="nav-link" id="v-tabs-profile-tab" href="#v-tabs-identitas_siswa"
                                    role="tab" aria-controls="v-tabs-profile" aria-selected="false">Identitas Siswa</a>
                                <a data-mdb-tab-init class="nav-link" id="v-tabs-messages-tab" href="#v-tabs-alamat"
                                    role="tab" aria-controls="v-tabs-alamat" aria-selected="false">Alamat</a>
                                <a data-mdb-tab-init class="nav-link" id="v-tabs-messages-tab" href="#v-tabs-pendidikan"
                                    role="tab" aria-controls="v-tabs-alamat" aria-selected="false">Riwayat Pendidikan</a>
                                <a data-mdb-tab-init class="nav-link" id="v-tabs-messages-tab" href="#v-tabs-ortu"
                                    role="tab" aria-controls="v-tabs-alamat" aria-selected="false">Identitas Orangtua</a>
                                <a data-mdb-tab-init class="nav-link" id="v-tabs-messages-tab" href="#v-tabs-wali"
                                    role="tab" aria-controls="v-tabs-alamat" aria-selected="false">Identitas Wali</a>
                                <a data-mdb-tab-init class="nav-link" id="v-tabs-messages-tab"
                                    href="#v-tabs-dokumen_kelengkapan" role="tab" aria-controls="v-tabs-alamat"
                                    aria-selected="false">Dokumen Kelengkapan</a>
                            </div>
                            <!-- Tab navs -->
                        </div>

                        <div class="col-9">
                            <!-- Tab content -->
                            <div class="tab-content" id="v-tabs-tabContent">
                                <div class="tab-pane fade show active" id="v-tabs-domisili" role="tabpanel"
                                    aria-labelledby="v-tabs-home-tab">
                                    {{-- form domisili siswa --}}

                                    <h5>Kelas Masuk dan Domisili</h5>
                                    <hr>
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Kelas Masuk</label>
                                            <select class="form-select" name="kelas_masuk" id="kelas_masuk"
                                                aria-label="Default select example">
                                                <option selected>Pilih Kelas Masuk</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="birthplace" class="form-label">Status Domisili</label>
                                            <select class="form-select" name="status_domisili" id="status_domisili"
                                                aria-label="Default select example">
                                                <option selected>Pilih Domisili</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary next">Submit</button>
                                    </form>







                                    {{-- Home content --}}
                                </div>
                                <div class="tab-pane fade" id="v-tabs-identitas_siswa" role="tabpanel"
                                    aria-labelledby="v-tabs-profile-tab">
                                    <h5>Identitas Siswa</h5>
                                    <hr>
                                    <form action="" method="post">

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama Siswa</label>
                                            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="city" class="form-label">NISN</label>
                                            <input type="text" class="form-control" name="nisn" id="nisn" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="province" class="form-label">Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="province" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="birthplace" class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" name="jenis_kelamin" id="jenis_kelamin"
                                                aria-label="Default select example" required>
                                                <option selected>Pilih Jenis Kelamin</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="province" class="form-label">Status Anak</label>
                                            <select class="form-select" name="status_anak" id="status_anak"
                                                aria-label="Default select example" required>
                                                <option selected>Pilih Jenis Kelamin</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="province" class="form-label">Agama</label>
                                            <select class="form-select" name="agama" id="agama"
                                                aria-label="Default select example" required>
                                                <option selected>Pilih Jenis Kelamin</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="province" class="form-label">No. Telp/HP</label>
                                            <input type="number" class="form-control" name="no_telp" id="no_telp"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="province" class="form-label">Golongan Darah</label>
                                            <select class="form-select" name="golda" id="golda"
                                                aria-label="Default select example" required>
                                                <option selected>Pilih Jenis Kelamin</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="province" class="form-label">Penyakit yang pernah diderita</label>
                                            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                                required />
                                        </div>
                                        <button type="submit" class="btn btn-primary next">Submit</button>

                                    </form>






                                </div>
                                <div class="tab-pane fade" id="v-tabs-alamat" role="tabpanel"
                                    aria-labelledby="v-tabs-messages-tab">
                                    <h5>Alamat</h5>
                                    <hr>
                                    <form action="" method="post">

                                        <div class="mb-3">
                                            <label for="school" class="form-label">Provinsi</label>
                                            <select class="form-select" name="golda" id="golda"
                                                aria-label="Default select example" required>
                                                <option selected>Pilih Jenis Kelamin</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="npsn" class="form-label">Kabupaten/Kota</label>
                                            <select class="form-select" name="golda" id="golda"
                                                aria-label="Default select example" required>
                                                <option selected>Pilih Jenis Kelamin</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="npsn" class="form-label">Kecamatan</label>
                                            <select class="form-select" name="golda" id="golda"
                                                aria-label="Default select example" required>
                                                <option selected>Pilih Jenis Kelamin</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="npsn" class="form-label">Desa/Kelurahan</label>
                                            <select class="form-select" name="golda" id="golda"
                                                aria-label="Default select example" required>
                                                <option selected>Pilih Jenis Kelamin</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="npsn" class="form-label">Kode Pos</label>
                                            <input type="text" class="form-control" id="npsn" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary next">Submit</button>




                                    </form>
                                </div>
                                <div class="tab-pane fade" id="v-tabs-pendidikan" role="tabpanel"
                                    aria-labelledby="v-tabs-messages-tab">
                                    <h5>Riwayat Pendidikan</h5>
                                    <hr>
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label for="school" class="form-label">Nama Sekolah Asal</label>
                                            <input type="text" class="form-control" id="school" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="school" class="form-label">Jenis Sekolah Asal</label>
                                            <input type="text" class="form-control" id="school" required />
                                        </div>
                                        <p class="fw-bold">Alamat Sekolah Asal</p>
                                        <hr />
                                        <div class="mb-3">
                                            <label for="school" class="form-label">Provinsi</label>
                                            <input type="text" class="form-control" id="school" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="school" class="form-label">Kabupaten/Kota</label>
                                            <input type="text" class="form-control" id="school" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="school" class="form-label">Kecamatan</label>
                                            <input type="text" class="form-control" id="school" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="school" class="form-label">Desa/Kelurahan</label>
                                            <input type="text" class="form-control" id="school" required />
                                        </div>
                                        <hr />
                                        <div class="mb-3">
                                            <label for="school" class="form-label">No Peserta Ujian SD/MI</label>
                                            <input type="text" class="form-control" id="school" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="achievement" class="form-label">Prestasi yang Pernah Diraih</label>
                                            <textarea class="form-control" id="achievement" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary next">Submit</button>






                                    </form>
                                </div>
                                <div class="tab-pane fade" id="v-tabs-ortu" role="tabpanel"
                                    aria-labelledby="v-tabs-messages-tab">
                                    <h5>Identitas Orang tua</h5>
                                    <hr>
                                    <form action="" method="post">

                                        <p class="fw-bold">Data Ayah</p>
                                        <div class="mb-3">
                                            <label for="father_name" class="form-label">Nama Ayah</label>
                                            <input type="text" class="form-control" id="father_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="mother_name" class="form-label">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="mother_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="mother_name" class="form-label">Tanggal Lahir</label>
                                            <input type="text" class="form-control" id="mother_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="mother_name" class="form-label">Pendidikan</label>
                                            <input type="text" class="form-control" id="mother_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="mother_name" class="form-label">Pekerjaan</label>
                                            <input type="text" class="form-control" id="mother_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="income" class="form-label">Penghasilan Per Bulan</label>
                                            <input type="text" class="form-control" id="income" required />
                                        </div>
                                        <hr />
                                        <p class="fw-bold">Data Ibu</p>
                                        <div class="mb-3">
                                            <label for="father_name" class="form-label">Nama Ibu</label>
                                            <input type="text" class="form-control" id="father_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="mother_name" class="form-label">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="mother_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="mother_name" class="form-label">Tanggal Lahir</label>
                                            <input type="text" class="form-control" id="mother_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="mother_name" class="form-label">Pendidikan</label>
                                            <input type="text" class="form-control" id="mother_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="mother_name" class="form-label">Pekerjaan</label>
                                            <input type="text" class="form-control" id="mother_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="income" class="form-label">Penghasilan Per Bulan</label>
                                            <input type="text" class="form-control" id="income" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary next">Submit</button>




                                    </form>
                                </div>
                                <div class="tab-pane fade" id="v-tabs-wali" role="tabpanel"
                                    aria-labelledby="v-tabs-messages-tab">
                                    <h5>Identitas Wali</h5>
                                    <hr>

                                    <form action="" method="post">

                                        <div class="mb-3">
                                            <label for="father_name" class="form-label">Nama Ibu</label>
                                            <input type="text" class="form-control" id="father_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="mother_name" class="form-label">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="mother_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="mother_name" class="form-label">Tanggal Lahir</label>
                                            <input type="text" class="form-control" id="mother_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="mother_name" class="form-label">Pendidikan</label>
                                            <input type="text" class="form-control" id="mother_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="mother_name" class="form-label">Pekerjaan</label>
                                            <input type="text" class="form-control" id="mother_name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="income" class="form-label">Penghasilan Per Bulan</label>
                                            <input type="text" class="form-control" id="income" required />
                                        </div>









                                        <button type="submit" class="btn btn-primary next">Submit</button>

                                    </form>

                                </div>
                                <div class="tab-pane fade" id="v-tabs-dokumen_kelengkapan" role="tabpanel"
                                    aria-labelledby="v-tabs-messages-tab">
                                    <h5>Upload Dokumen Kelengkapan</h5>
                                    <hr>

                                    <form action="" method="post">
                                        <label class="form-label" for="customFile">Foto Siswa</label>
                                        <input type="file" class="form-control" id="customFile" />

                                        <button type="submit" class="btn btn-primary mt-2 next">Submit</button>
                                    </form>
                                    <form action="" method="post">
                                        <label class="form-label" for="customFile">Foto Siswa</label>
                                        <input type="file" class="form-control" id="customFile" />

                                        <button type="submit" class="btn btn-primary mt-2 next">Submit</button>
                                    </form>
                                    <form action="" method="post">
                                        <label class="form-label" for="customFile">Foto Siswa</label>
                                        <input type="file" class="form-control" id="customFile" />

                                        <button type="submit" class="btn btn-primary mt-2 next">Submit</button>
                                    </form>
                                    <form action="" method="post">
                                        <label class="form-label" for="customFile">Foto Siswa</label>
                                        <input type="file" class="form-control" id="customFile" />

                                        <button type="submit" class="btn btn-primary mt-2 next">Submit</button>
                                    </form>

                                </div>
                            </div>
                            <!-- Tab content -->
                        </div>
                    </div>


                    <!-- Accordion untuk tampilan mobile -->



                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button data-mdb-collapse-init class="accordion-button" type="button"
                                    data-mdb-target="#kelas_domisili" aria-expanded="true" aria-controls="kelas_domisili">
                                    Kelas dan Domisili
                                </button>
                            </h2>
                            <div id="kelas_domisili" class="accordion-collapse collapse " aria-labelledby="headingOne"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                  <form class="form-identitassiswa1"
                                                action="{{ route('form_update_identitas', $siswa->id) }} method=" post"
                                                novalidate="novalidate">
                                                @csrf
                                                @method('POST') <!-- This is optional since POST is the default method -->
                                                <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                                <div class="form-group row">
                                                    <label class="col-md-4 col-form-label" for="val-skill">Kelas Masuk <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col">
                                                        <select class="form-control" id="kelas_masuk" name="kelas_masuk">


                                                            <option value="">Pilih Kelas Masuk</option>
                                                            @foreach (['Siswa Baru Kelas 7', 'Siswa Baru Kelas 8', 'Siswa Baru Kelas 9'] as $kelas)
                                                                <option value="{{ $kelas }}" {{ $siswa->kelas === $kelas ? 'selected' : '' }}>
                                                                    {{ $kelas }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        {{-- @if ($siswa->kelas_masuk === null|| '')
                                                        <option value="">Pilih Kelas Masuk</option>
                                                        <option value="Siswa Baru Kelas 7">Siswa Baru Kelas 7</option>
                                                        <option value="Siswa Baru Kelas 8">Siswa Baru Kelas 8</option>
                                                        <option value="Siswa Baru Kelas 9">Siswa Baru Kelas 9</option>
                                                        @elseif ($siswa->kelas_masuk==='Siswa Baru Kelas 7')
                                                        <option value="Siswa Baru Kelas 7">Siswa Baru Kelas 7</option>
                                                        <option selected value="Siswa Baru Kelas 8">Siswa Baru Kelas 8
                                                        </option>
                                                        <option value="Siswa Baru Kelas 9">Siswa Baru Kelas 9</option>
                                                        @elseif ($siswa->kelas_masuk==='Siswa Baru Kelas 8')
                                                        <option value="Siswa Baru Kelas 7">Siswa Baru Kelas 7</option>
                                                        <option selected value="Siswa Baru Kelas 8">Siswa Baru Kelas 8
                                                        </option>
                                                        <option value="Siswa Baru Kelas 9">Siswa Baru Kelas 9</option>
                                                        @elseif ($siswa->kelas_masuk==='Siswa Baru Kelas 9')
                                                        <option value="Siswa Baru Kelas 7">Siswa Baru Kelas 7</option>
                                                        <option value="Siswa Baru Kelas 8">Siswa Baru Kelas 8</option>
                                                        <option selected value="Siswa Baru Kelas 9">Siswa Baru Kelas 9
                                                        </option>
                                                        @endif --}}
                                                        {{-- <option value="html">HTML</option>
                                                        <option value="css">CSS</option> --}}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-4 col-form-label" for="val-skill">Status Domisili
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col">
                                                        <select class="form-control" id="status_domisili"
                                                            name="status_domisili">
                                                            @if ($siswa->domisili == null || "")
                                                                <option value="">Pilih Domisili</option>
                                                                <option value="Mondok">Mondok</option>
                                                                <option value="Tidak Mondok">Tidak Mondok</option>
                                                            @elseif($siswa->domisili == 'Tidak Mondok')
                                                                <option selected value="Tidak Mondok">Tidak Mondok</option>
                                                                <option value="Mondok">Mondok</option>
                                                            @else
                                                                <option value="Tidak Mondok">Tidak Mondok</option>
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
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-target="#identitas_siswa" aria-expanded="false" aria-controls="identitas_siswa">
                                  Identitas Siswa
                                </button>
                            </h2>
                            <div id="identitas_siswa" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by
                                    default, until the collapse plugin adds the appropriate classes that we use to
                                    style each element. These classes control the overall appearance, as well as the
                                    showing and hiding via CSS transitions. You can modify any of this with custom CSS
                                    or overriding our default variables. It's also worth noting that just about any
                                    HTML can go within the <strong>.accordion-body</strong>, though the transition
                                    does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-target="#alamat" aria-expanded="false" aria-controls="alamat">
                                  Alamat
                                </button>
                            </h2>
                            <div id="alamat" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or
                                    overriding our default variables. It's also worth noting that just about any HTML
                                    can go within the <strong>.accordion-body</strong>, though the transition does
                                    limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-target="#pendidikan" aria-expanded="false" aria-controls="pendidikan">
                                  Riwayat Pendidikan
                                </button>
                            </h2>
                            <div id="pendidikan" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or
                                    overriding our default variables. It's also worth noting that just about any HTML
                                    can go within the <strong>.accordion-body</strong>, though the transition does
                                    limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-target="#identitas_ortu" aria-expanded="false" aria-controls="identitas_ortu">
                                 Identitas Orang Tua
                                </button>
                            </h2>
                            <div id="identitas_ortu" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or
                                    overriding our default variables. It's also worth noting that just about any HTML
                                    can go within the <strong>.accordion-body</strong>, though the transition does
                                    limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-target="#identitas_wali" aria-expanded="false" aria-controls="identitas_wali">
                                 Identitas Wali
                                </button>
                            </h2>
                            <div id="identitas_wali" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or
                                    overriding our default variables. It's also worth noting that just about any HTML
                                    can go within the <strong>.accordion-body</strong>, though the transition does
                                    limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-target="#upload_berkas" aria-expanded="false" aria-controls="upload_berkas">
                                 Dokumen Kelengkapan
                                </button>
                            </h2>
                            <div id="upload_berkas" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or
                                    overriding our default variables. It's also worth noting that just about any HTML
                                    can go within the <strong>.accordion-body</strong>, though the transition does
                                    limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

        </div>





    </div>






@endsection

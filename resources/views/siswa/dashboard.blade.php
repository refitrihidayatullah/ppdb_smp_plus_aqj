@extends('layout.main_siswa')

@section('title', 'SPMB SMPP Al-Qodiri Jember')

@section('content')




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
                            <img src="
                                                        @if ($siswa->foto_siswa == '')
                                                            {{ asset('asset/user.png') }}
                                                        @else
                                                               {{asset('uploads/foto_siswa/' . $siswa->foto_siswa)}}
                                                        @endif
                                                        " class="img-fluid"
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
                            @if($siswa->status_selesai == 'Sudah Selesai')
                                <a href="{{ route('generate_pdf') }}" role="button" class="btn btn-primary"
                                    data-mdb-ripple-init>Download Formulir</a>
                            @else
                                {{-- <span class="badge bg-success">Sudah Selesai</span> --}}
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container mt-2">
            <div class="card">
                <div class="card-body">
                    {{-- pemberitahuan untuk melengkapi formulir --}}
                    {{-- jika sudah di selesaikan oleh siswa maka munculkan ini --}}
                    @if($siswa->status_selesai == 'Sudah Selesai')
                        <style>
                            .form-section {
                                margin-bottom: 2rem;
                                padding: 1.5rem;
                                border: 1px solid #dee2e6;
                                border-radius: 0.5rem;
                            }

                            .section-title {
                                background-color: #f8f9fa;
                                padding: 0.5rem 1rem;
                                margin-bottom: 1.5rem;
                                border-left: 4px solid #0d6efd;
                            }

                            .form-item {
                                margin-bottom: 1rem;
                                padding-bottom: 0.5rem;
                                border-bottom: 1px dashed #eee;
                            }

                            .placeholder-text {
                                color: #6c757d;
                                font-style: italic;
                            }
                        </style>


                        <div class="alert alert-success" role="alert">
                            <strong>Formulir SPMB telah selesai diisi silakan menghubungi admin untuk proses validasi! </strong>
                            <br>
                            Berikut ini Detail Data Siswa Terdaftar <br>
                            Status Validasi :
                            @if($siswa->status_validasi == 'Belum Validasi')
                                <span class="badge bg-danger">Belum Validasi</span>
                            @else
                                <span class="badge bg-success">Sudah Validasi</span>
                            @endif
                        </div>

                        <div class="container mt-4 mb-5">


                            <!-- Bagian A: Identitas Siswa (dilisi petugas PPDB) -->
                            <div class="form-section">
                                <div class="section-title">
                                    <h5>A. Identitas Siswa (dilisi petugas PPDB)</h5>
                                </div>
                                {{-- <div class="form-item">
                                    <strong>1. Nis Lokal :</strong> <span
                                        class="placeholder-text">.................................</span>
                                </div> --}}
                                <div class="form-item">
                                    <strong>1. Kelas :</strong> <span class="placeholder-text">
                                        {{$siswa->kelas}}
                                    </span>
                                </div>
                                <div class="form-item">
                                    <strong>2. Domisili :</strong> <span class="placeholder-text">
                                        {{$siswa->domisili}}
                                    </span>
                                </div>
                            </div>

                            <!-- Bagian B: Identitas Siswa (dilisi oleh siswa) -->
                            <div class="form-section">
                                <div class="section-title">
                                    <h5>B. Identitas Siswa (dilisi oleh siswa)</h5>
                                </div>
                                <div class="form-item">
                                    <strong>1. Nama Siswa :</strong> <span class="placeholder-text">
                                        {{$siswa->nama_siswa}}
                                    </span>
                                </div>
                                <div class="form-item">
                                    <strong>2. NISN :</strong> <span class="placeholder-text">
                                        {{$siswa->nisn_siswa}}
                                    </span>
                                </div>
                                <div class="form-item">
                                    <strong>3. Tempat, Tgl Lahir :</strong> <span class="placeholder-text">
                                        {{ $siswa->tempat_lahir }} , {{ $siswa->tanggal_lahir }}
                                    </span>
                                </div>
                                <div class="form-item">
                                    <strong>4. Jenis Kelamin :</strong> <span class="placeholder-text">
                                        {{ $siswa->jenis_kelamin }}
                                    </span>
                                </div>
                                <div class="form-item">
                                    <strong>5. Alamat :</strong>
                                    <div class="ms-3 mt-2">
                                        <div class="form-item">
                                            <strong>Desa/Kelurahan :</strong> <span class="placeholder-text">
                                                {{ $siswa->nama_desa }}
                                            </span>
                                        </div>
                                        <div class="form-item">
                                            <strong>Kecamatan :</strong> <span class="placeholder-text">
                                                {{ $siswa->nama_kecamatan }}
                                            </span>
                                        </div>
                                        <div class="form-item">
                                            <strong>Kabupaten :</strong> <span class="placeholder-text">
                                                {{ $siswa->nama_kabupaten }}
                                            </span>
                                        </div>
                                        <div class="form-item">
                                            <strong>Provinsi :</strong> <span class="placeholder-text">
                                                {{ $siswa->nama_provinsi }}
                                            </span>
                                        </div>
                                        {{-- <div class="form-item">
                                            <strong>Kode Pos :</strong> <span class="placeholder-text">
                                                << Kode Pos>>
                                            </span>
                                        </div> --}}
                                    </div>
                                </div>
                                {{-- <div class="form-item">
                                    <strong>Anak ke :</strong> <span class="placeholder-text">
                                        << Anak Ke>>
                                    </span>
                                </div> --}}
                                {{-- <div class="form-item">
                                    <strong>Jumlah saudara :</strong> <span class="placeholder-text">
                                        << Jumlah Saudara>>
                                    </span>
                                </div> --}}
                                <div class="form-item">
                                    <strong>6. Status Anak :</strong> <span class="placeholder-text">
                                        {{$siswa->status_anak}}
                                    </span>
                                </div>
                                <div class="form-item">
                                    <strong>7. Agama :</strong> <span class="placeholder-text">
                                        {{$siswa->agama}}
                                    </span>
                                </div>
                                <div class="form-item">
                                    <strong>8. Nomor Telp/HP :</strong> <span class="placeholder-text">
                                        {{$siswa->no_hp}}
                                    </span>
                                </div>
                                <div class="form-item">
                                    <strong>9. Gol. Darah :</strong> <span class="placeholder-text">
                                        {{$siswa->golongan_darah}}
                                    </span>
                                </div>
                                <div class="form-item">
                                    <strong>10. Penyakit yang pernah diderita :</strong> <span class="placeholder-text">
                                        {{$siswa->penyakit_yang_diderita}}
                                    </span>
                                </div>
                            </div>

                            <!-- Bagian C: Riwayat Pendidikan -->
                            <div class="form-section">
                                <div class="section-title">
                                    <h5>C. Riwayat Pendidikan</h5>
                                </div>
                                <div class="form-item">
                                    <strong>1. Nama Sekolah asal:</strong> <span class="placeholder-text">
                                        {{$siswa->nama_sekolah_asal}}
                                    </span>
                                </div>
                                <div class="form-item">
                                    <strong>2. Jenis Sekolah asal :</strong> <span class="placeholder-text">
                                        {{$siswa->jenis_sekolah_asal}}
                                    </span>
                                </div>
                                <div class="form-item">
                                    <strong>3. Nomor Peserta Ujian Jenjang SD/MI :</strong> <span class="placeholder-text">
                                        {{$siswa->no_peserta_ujian}}
                                    </span>
                                </div>
                                <div class="form-item">
                                    <strong>4. NPSN Sekolah asal:</strong> <span class="placeholder-text">
                                        {{$siswa->npsn_sekolah_asal}}
                                    </span>
                                </div>
                                <div class="form-item">
                                    <strong>5. Alamat Sekolah asal:</strong>
                                    <div class="ms-3 mt-2">
                                        <div class="form-item">
                                            <strong>Alamat Lengkap</strong> <span class="placeholder-text">
                                                {{$siswa->alamat_sekolah_lengkap}}
                                            </span>
                                        </div>
                                        <div class="form-item">
                                            <strong>Kecamatan :</strong> <span class="placeholder-text">
                                                {{$siswa->alamat_sekolah_kecamatan}}
                                            </span>
                                        </div>
                                        <div class="form-item">
                                            <strong>Kabupaten :</strong> <span class="placeholder-text">
                                                {{$siswa->alamat_sekolah_kabupaten}}
                                            </span>
                                        </div>
                                        <div class="form-item">
                                            <strong>Provinsi :</strong> <span class="placeholder-text">
                                                {{$siswa->alamat_sekolah_provinsi}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <strong>6. Prestasi yang pernah diraih :</strong> <span class="placeholder-text">
                                        {{$siswa->prestasi_yang_diraih}}
                                    </span>
                                </div>
                            </div>

                            <!-- Bagian D: Identitas Orang Tua -->
                            <div class="form-section">
                                <div class="section-title">
                                    <h5>D. Identitas Orang Tua</h5>
                                </div>

                                <!-- Subbagian D.1: Identitas AYAH -->
                                <div class="ms-3 mb-4">
                                    <h6>D.1. Identitas AYAH</h6>
                                    <div class="form-item">
                                        <strong>1. Nama :</strong> <span class="placeholder-text">
                                            {{$siswa->nama_ayah}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>2. Tempat lahir :</strong> <span class="placeholder-text">
                                            {{$siswa->tempat_lahir_ayah}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>3. Tgl lahir :</strong> <span class="placeholder-text">
                                            {{$siswa->tanggal_lahir_ayah}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>4. Hubungan dengan siswa :</strong> <span class="placeholder-text">
                                            {{$siswa->hubungan_dengan_siswa_ayah}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>5. Pendidikan :</strong> <span class="placeholder-text">
                                            {{$siswa->pendidikan_ayah}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>6. Pekerjaan :</strong> <span class="placeholder-text">
                                            {{$siswa->pekerjaan_ayah}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>7. Penghasilan Perbulan :</strong> <span class="placeholder-text">
                                            {{$siswa->penghasilan_ayah}}
                                        </span>
                                    </div>
                                </div>

                                <!-- Subbagian D.2: Identitas IBU -->
                                <div class="ms-3 mb-4">
                                    <h6>D.2. Identitas IBU</h6>
                                    <div class="form-item">
                                        <strong>1. Nama :</strong> <span class="placeholder-text">
                                            {{$siswa->nama_ibu}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>2. Tempat Lahir :</strong> <span class="placeholder-text">
                                            {{$siswa->tempat_lahir_ibu}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>3. Tanggal lahir :</strong> <span class="placeholder-text">
                                            {{$siswa->tanggal_lahir_ibu}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>4. Hubungan dengan siswa :</strong> <span class="placeholder-text">
                                            {{$siswa->hubungan_dengan_siswa_ibu}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>5. Pendidikan :</strong> <span class="placeholder-text">
                                            {{$siswa->pendidikan_ibu}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>6. Pekerjaan :</strong> <span class="placeholder-text">
                                            {{$siswa->pekerjaan_ibu}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>7. Penghasilan Perbulan :</strong> <span class="placeholder-text">
                                            {{$siswa->penghasilan_ibu}}
                                        </span>
                                    </div>
                                </div>

                                <!-- Subbagian D.3: Identitas WALI -->
                                <div class="ms-3">
                                    <h6>D.3. Identitas WALI</h6>
                                    <div class="form-item">
                                        <strong>1. Nama :</strong> <span class="placeholder-text">
                                            {{$siswa->nama_wali}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>2. Tempat lahir :</strong> <span class="placeholder-text">
                                            {{$siswa->tempat_lahir_wali}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>3. Tanggal lahir :</strong> <span class="placeholder-text">
                                            {{$siswa->tanggal_lahir_wali}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>4. Pendidikan :</strong> <span class="placeholder-text">
                                            {{$siswa->pendidikan_wali}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>5. Pekerjaan :</strong> <span class="placeholder-text">
                                            {{$siswa->pekerjaan_wali}}
                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>6. Penghasilan Perbulan :</strong> <span class="placeholder-text">
                                            {{$siswa->penghasilan_wali}}
                                        </span>
                                    </div>
                                </div>

                                <div class="form-section">
                                    <div class="section-title">
                                        <h5>E. Dokumen Kelengkapan</h5>
                                    </div>

                                    <div class="form-item">
                                        <strong>1. Foto Siswa: </strong> <span class="placeholder-text">
                                            <a href="{{ asset('uploads/foto_siswa/') . '/' . $siswa->foto_siswa }}">Lihat
                                                Dokumen</a>

                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>2. Kartu Keluarga :</strong> <span class="placeholder-text">
                                            <a href="{{ asset('uploads/kartu_keluarga/') . '/' . $siswa->kartu_keluarga }}">Lihat
                                                Dokumen</a>

                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>3.Ijazah SD/MI:</strong> <span class="placeholder-text">
                                            <a href="{{ asset('uploads/ijazah/') . '/' . $siswa->ijazah_sd_mi }}">Lihat
                                                Dokumen</a>

                                        </span>
                                    </div>
                                    <div class="form-item">
                                        <strong>4. KTP Orangtua:</strong> <span class="placeholder-text">
                                            <a href="{{ asset('uploads/ktp/') . '/' . $siswa->ktp_orang_tua }}">Lihat
                                                Dokumen</a>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>





                        {{-- jika belum menyelesaikan formulir munculkan ini --}}
                    @else


                        <div class="alert alert-warning" role="alert">
                            Lengkapi Formulir berikut! jika sudah selesai silakan klik selesai
                        </div>
                        {{-- pemberitahuan untuk melengkapi formulir --}}


                        <!-- Accordion untuk tampilan mobile -->



                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button data-mdb-collapse-init class="accordion-button fw-bold" type="button"
                                        data-mdb-target="#kelas_domisili" aria-expanded="true" aria-controls="kelas_domisili">
                                        Kelas dan Domisili
                                    </button>
                                </h2>
                                <div id="kelas_domisili" class="accordion-collapse collapse " aria-labelledby="headingOne"
                                    data-mdb-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form class="form-identitassiswa1"
                                            action="{{ route('siswa_form_update_identitas', $siswa->id) }} method=" post"
                                            novalidate="novalidate">
                                            @csrf
                                            @method('POST')
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Kelas Masuk</label>
                                                <select class="form-select" name="kelas_masuk" id="kelas_masuk"
                                                    aria-label="Default select example">
                                                    <option value="">Pilih Kelas Masuk</option>
                                                    @foreach (['Siswa Baru Kelas 7', 'Siswa Baru Kelas 8', 'Siswa Baru Kelas 9'] as $kelas)
                                                        <option value="{{ $kelas }}" {{ $siswa->kelas === $kelas ? 'selected' : '' }}>
                                                            {{ $kelas }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="birthplace" class="form-label">Status Domisili</label>
                                                <select class="form-control" id="status_domisili" name="status_domisili">
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
                                            <button type="submit" class="btn btn-primary next">Submit</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button data-mdb-collapse-init class="accordion-button collapsed fw-bold" type="button"
                                        data-mdb-target="#identitas_siswa" aria-expanded="false"
                                        aria-controls="identitas_siswa">
                                        Identitas Siswa
                                    </button>
                                </h2>
                                <div id="identitas_siswa" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-mdb-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form class="form-identitassiswa2"
                                            action="{{ route('siswa_form_update_identitas_siswa', $siswa->id) }}" method="post"
                                            novalidate="novalidate">
                                            @csrf
                                            @method('POST')

                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama Siswa</label>
                                                <input type="text" class="form-control" name="nama_siswa" id="nama_siswa"
                                                    value="{{$siswa->nama_siswa}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="city" class="form-label">NISN</label>
                                                <input type="text" class="form-control" name="nisn" id="nisn"
                                                    value="{{$siswa->nisn_siswa}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="province" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                                    value="{{$siswa->tempat_lahir}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="province" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir_siswa"
                                                    id="tanggal_lahir_siswa" value="{{ $siswa->tanggal_lahir }}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="birthplace" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="jenis_kelamin" id="jenis_kelamin"
                                                    aria-label="Default select example">
                                                    @if ($siswa->jenis_kelamin == null || "")
                                                        <option selected value="">Pilih Jenis Kelamin</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    @elseif($siswa->jenis_kelamin == 'Laki-laki')
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option selected value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    @else
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option selected value="Perempuan">Perempuan</option>
                                                    @endif

                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="province" class="form-label">Status Anak</label>
                                                <select class="form-select" name="status_anak" id="status_anak"
                                                    aria-label="Default select example">
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
                                                        <option selected value="Anak Yatim Piatu">Anak Yatim Piatu
                                                        </option>

                                                    @endif
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="province" class="form-label">Agama</label>
                                                <select class="form-select" name="agama_siswa" id="agama_siswa"
                                                    aria-label="Default select example">
                                                    @if ($siswa->agama == null || '')
                                                        <option value="">Pilih Agama</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Katolik">Katolik</option>
                                                        <option value="Budha">Budha</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Konghucu">Konghucu</option>
                                                    @elseif($siswa->agama == 'Islam')
                                                        <option value="">Pilih Agama</option>
                                                        <option selected value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Katolik">Katolik</option>
                                                        <option value="Budha">Budha</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Konghucu">Konghucu</option>
                                                    @elseif($siswa->agama == 'Kristen')
                                                        <option value="">Pilih Agama</option>
                                                        <option value="Islam">Islam</option>
                                                        <option selected value="Kristen">Kristen</option>
                                                        <option value="Katolik">Katolik</option>
                                                        <option value="Budha">Budha</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Konghucu">Konghucu</option>
                                                    @elseif($siswa->agama == 'Katolik')
                                                        <option value="">Pilih Agama</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option selected value="Katolik">Katolik</option>
                                                        <option value="Budha">Budha</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Konghucu">Konghucu</option>
                                                    @elseif($siswa->agama == 'Budha')
                                                        <option value="">Pilih Agama</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Katolik">Katolik</option>
                                                        <option selected value="Budha">Budha</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Konghucu">Konghucu</option>
                                                    @elseif($siswa->agama == 'Hindu')
                                                        <option value="">Pilih Agama</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Katolik">Katolik</option>
                                                        <option value="Budha">Budha</option>
                                                        <option selected value="Hindu">Hindu</option>
                                                        <option value="Konghucu">Konghucu</option>
                                                    @elseif($siswa->agama == 'Konghuchu')
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
                                            <div class="mb-3">
                                                <label for="province" class="form-label">No. Telp/HP</label>
                                                <input type="number" class="form-control" name="no_hp" id="no_hp" value={{ $siswa->no_hp }} />
                                            </div>
                                            <div class="mb-3">
                                                <label for="province" class="form-label">Golongan Darah</label>
                                                <select class="form-select" name="golda" id="golda"
                                                    aria-label="Default select example">
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

                                            <div class="mb-3">
                                                <label for="province" class="form-label">Penyakit yang pernah diderita</label>
                                                <input type="text" class="form-control" name="penyakit_siswa"
                                                    id="penyakit_siswa" value={{ $siswa->penyakit_yang_diderita }} />
                                            </div>
                                            <button type="submit" class="btn btn-primary next">Submit</button>

                                        </form>


                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button data-mdb-collapse-init class="accordion-button collapsed fw-bold" type="button"
                                        data-mdb-target="#alamat" aria-expanded="false" aria-controls="alamat">
                                        Alamat
                                    </button>
                                </h2>
                                <div id="alamat" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-mdb-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form class="form-alamat_siswa"
                                            action="{{ route('siswa_form_update_alamat_siswa', $siswa->id) }}" method="post"
                                            novalidate="novalidate">
                                            @csrf
                                            @method('POST')

                                            <div class="mb-3">
                                                <label for="school" class="form-label">Provinsi</label>
                                                <select class="form-select" name="provinsi_siswa" id="provinsi_siswa"
                                                    aria-label="Default select example" required>
                                                    <option value="">Pilih Provinisi</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="npsn" class="form-label">Kabupaten/Kota</label>
                                                <select class="form-select" name="kabupaten_siswa" id="kabupaten_siswa"
                                                    aria-label="Default select example" required>
                                                    <option value="">Pilih Kabupaten</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="npsn" class="form-label">Kecamatan</label>
                                                <select class="form-select" name="kecamatan_siswa" id="kecamatan_siswa"
                                                    aria-label="Default select example" required>
                                                    <option value="">Pilih Kecamatan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="npsn" class="form-label">Desa/Kelurahan</label>
                                                <select class="form-select" name="desa_kelurahan_siswa"
                                                    id="desa_kelurahan_siswa" aria-label="Default select example" required>
                                                    <option value="">Pilih Desa/Kelurahan</option>
                                                </select>
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="npsn" class="form-label">Kode Pos</label>
                                                <input type="text" class="form-control" id="npsn" required />
                                            </div> --}}
                                            <button type="submit" class="btn btn-primary next">Submit</button>




                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button data-mdb-collapse-init class="accordion-button collapsed fw-bold fw-bold"
                                        type="button" data-mdb-target="#pendidikan" aria-expanded="false"
                                        aria-controls="pendidikan">
                                        Riwayat Pendidikan
                                    </button>
                                </h2>
                                <div id="pendidikan" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-mdb-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form class="form-pendidikan_siswa"
                                            action="{{ route('siswa_form_update_pendidikan_siswa', $siswa->id) }}" method="post"
                                            novalidate="novalidate">
                                            @csrf
                                            @method('POST')
                                            <div class="mb-3">
                                                <label for="school" class="form-label">NPSN</label>
                                                <input type="text" class="form-control" id="npsn_sekolah_asal"
                                                    name="npsn_sekolah_asal" placeholder="Masukkan NPSN Sekolah"
                                                    value="{{$siswa->npsn_sekolah_asal}}">
                                                <small> untuk mencari NPSN silakan mencari di website <a
                                                        href="https://referensi.data.kemdikbud.go.id/">
                                                        referensi.data.kemdikbud.go.id </a> </small>
                                            </div>
                                            <div class="mb-3">
                                                <label for="school" class="form-label">Nama Sekolah Asal</label>
                                                <input type="text" class="form-control" id="nama_sekolah_asal"
                                                    name="nama_sekolah_asal" placeholder="Masukkan Nama Sekolah Asal"
                                                    value={{$siswa->nama_sekolah_asal}}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="school" class="form-label">Jenis Sekolah Asal</label>
                                                <input type="text" class="form-control" id="jenis_sekolah_asal"
                                                    name="jenis_sekolah_asal" placeholder="Masukkan Jenis Sekolah Asal"
                                                    value="{{$siswa->jenis_sekolah_asal}}">
                                            </div>
                                            <p class="fw-bold">Alamat Sekolah Asal</p>
                                            <hr />
                                            <div class="mb-3">
                                                <label for="school" class="form-label">Provinsi</label>
                                                <input type="text" class="form-control" id="alamat_sekolah_provinsi"
                                                    name="alamat_sekolah_provinsi" placeholder="Masukkan Provinsi Sekolah Asal"
                                                    value="{{$siswa->alamat_sekolah_provinsi}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="school" class="form-label">Kabupaten/Kota</label>
                                                <input type="text" class="form-control" id="alamat_sekolah_kabupaten"
                                                    name="alamat_sekolah_kabupaten"
                                                    placeholder="Masukkan Kabupaten Sekolah Asal"
                                                    value="{{$siswa->alamat_sekolah_kabupaten}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="school" class="form-label">Kecamatan</label>
                                                <input type="text" class="form-control" id="alamat_sekolah_kecamatan"
                                                    name="alamat_sekolah_kecamatan"
                                                    placeholder="Masukkan Kecamatan Sekolah Asal"
                                                    value="{{$siswa->alamat_sekolah_kecamatan}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="school" class="form-label">Alamat Lengkap</label>
                                                <input type="text" class="form-control" id="alamat_sekolah_lengkap"
                                                    name="alamat_sekolah_lengkap"
                                                    placeholder="Masukkan Alamat Lengkap Sekolah Asal"
                                                    value="{{$siswa->alamat_sekolah_lengkap}}">
                                            </div>
                                            <hr />
                                            <div class="mb-3">
                                                <label for="school" class="form-label">No Peserta Ujian SD/MI</label>
                                                <input type="number" class="form-control" id="no_peserta_ujian"
                                                    name="no_peserta_ujian"
                                                    placeholder="Masukkan Nomor Peserta Ujian (tidak wajib)"
                                                    value="{{$siswa->no_peserta_ujian}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="achievement" class="form-label">Prestasi yang Pernah Diraih</label>
                                                <input type="text" class="form-control" id="prestasi_yang_diraih"
                                                    name="prestasi_yang_diraih"
                                                    placeholder="Masukkan Prestasi yang diraih (tidak wajib)"
                                                    value="{{$siswa->prestasi_yang_diraih}}">
                                            </div>
                                            <button type="submit" class="btn btn-primary next">Submit</button>






                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button data-mdb-collapse-init class="accordion-button collapsed fw-bold" type="button"
                                        data-mdb-target="#identitas_ortu" aria-expanded="false" aria-controls="identitas_ortu">
                                        Identitas Orang Tua
                                    </button>
                                </h2>
                                <div id="identitas_ortu" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-mdb-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form class="form-ortusiswa"
                                            action="{{ route('siswa_form_update_ortu_siswa', $siswa->id) }} method=" post"
                                            novalidate="novalidate"> @csrf
                                            @method('POST')

                                            <p class="fw-bold">Data Ayah</p>
                                            <div class="mb-3">
                                                <label for="father_name" class="form-label">Nama Ayah</label>
                                                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                                                    placeholder="Masukkan Nama Ayah" value="{{$siswa->nama_ayah}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="mother_name" class="form-label">Tempat Lahir Ayah</label>
                                                <input type="text" class="form-control" id="tempat_lahir_ayah"
                                                    name="tempat_lahir_ayah" placeholder="Masukkan Tempat Lahir Ayah"
                                                    value="{{$siswa->tempat_lahir_ayah}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="mother_name" class="form-label">Tanggal Lahir Ayah</label>
                                                <input type="date" class="form-control" id="tanggal_lahir_ayah"
                                                    name="tanggal_lahir_ayah" placeholder="Choose a safe one.."
                                                    value="{{$siswa->tanggal_lahir_ayah}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="mother_name" class="form-label">Hubungan Dengan Siswa</label>
                                                <select class="form-control" id="hubungan_dengan_siswa_ayah"
                                                    name="hubungan_dengan_siswa_ayah">

                                                    @if($siswa->hubungan_dengan_siswa_ayah == null || '')
                                                        <option value="">Pilih Hubungan Dengan Ayah Siswa
                                                        </option>
                                                        <option value="Ayah Kandung">Ayah Kandung</option>
                                                        <option value="Ayah Tiri">Ayah Tiri</option>
                                                        <option value="Ayah Angkat">Ayah Angkat</option>
                                                    @elseif($siswa->hubungan_dengan_siswa_ayah == 'Ayah Kandung')
                                                        <option value="">Pilih Hubungan Dengan Ayah Siswa
                                                        </option>
                                                        <option selected value="Ayah Kandung">Ayah Kandung
                                                        </option>
                                                        <option value="Ayah Tiri">Ayah Tiri</option>
                                                        <option value="Ayah Angkat">Ayah Angkat</option>
                                                    @elseif($siswa->hubungan_dengan_siswa_ayah == 'Ayah Tiri')
                                                        <option value="">Pilih Hubungan Dengan Ayah Siswa
                                                        </option>
                                                        <option value="Ayah Kandung">Ayah Kandung</option>
                                                        <option selected value="Ayah Tiri">Ayah Tiri</option>
                                                        <option value="Ayah Angkat">Ayah Angkat</option>
                                                    @else
                                                        <option value="">Pilih Hubungan Dengan Ayah Siswa
                                                        </option>
                                                        <option value="Ayah Kandung">Ayah Kandung</option>
                                                        <option value="Ayah Tiri">Ayah Tiri</option>
                                                        <option selected value="Ayah Angkat">Ayah Angkat
                                                        </option>
                                                    @endif

                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="mother_name" class="form-label">Pendidikan</label>
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
                                            <div class="mb-3">
                                                <label for="income" class="form-label">Pekerjaan Ayah</label>
                                                <input type="text" class="form-control" id="pekerjaan_ayah"
                                                    name="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah"
                                                    value="{{$siswa->pekerjaan_ayah}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="income" class="form-label">Penghasilan Per Bulan</label>
                                                <select class="form-control" id="penghasilan_ayah" name="penghasilan_ayah">

                                                    @if($siswa->penghasilan_ayah == null || '')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_ayah == 'Kurang dari Rp. 500.000')
                                                        <option value="">Please select</option>
                                                        <option selected value="Kurang dari Rp. 500.000">Kurang
                                                            dari Rp. 500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_ayah == 'Rp. 500.000 - Rp. 1.000.000')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option selected value="Rp. 500.000 - Rp. 1.000.000">Rp.
                                                            500.000 - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_ayah == 'Rp. 1.000.000 - Rp. 2.000.000')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option selected value="Rp. 1.000.000 - Rp. 2.000.000">
                                                            Rp. 1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_ayah == 'Rp. 2.000.000 - Rp. 3.000.000')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option selected value="Rp. 2.000.000 - Rp. 3.000.000">
                                                            Rp. 2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_ayah == 'Lebih Dari Rp. 3.000.000')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option selected value="Lebih Dari Rp. 3.000.000">Lebih
                                                            Dari Rp. 3.000.000</option>
                                                    @endif

                                                </select>
                                            </div>
                                            <hr />
                                            <p class="fw-bold">Data Ibu</p>
                                            <div class="mb-3">
                                                <label for="father_name" class="form-label">Nama Ibu</label>
                                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                                    placeholder="Masukkan Nama Ibu" value="{{$siswa->nama_ibu}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="mother_name" class="form-label">Tempat Lahir Ibu</label>
                                                <input type="text" class="form-control" id="tempat_lahir_ibu"
                                                    name="tempat_lahir_ibu" placeholder="Masukkan Tempat Lahir Ibu"
                                                    value="{{$siswa->tempat_lahir_ibu}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="mother_name" class="form-label">Tanggal Lahir Ibu</label>
                                                <input type="date" class="form-control" id="tanggal_lahir_ibu"
                                                    name="tanggal_lahir_ibu" placeholder="Choose a safe one.."
                                                    value={{$siswa->tanggal_lahir_ibu}}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="mother_name" class="form-label">Hubungan Dengan Siswa</label>
                                                <select class="form-control" id="hubungan_dengan_siswa_ibu"
                                                    name="hubungan_dengan_siswa_ibu">


                                                    @if($siswa->hubungan_dengan_siswa_ibu == null || '')
                                                        <option value="">Pilih Hubungan Dengan Ibu Siswa
                                                        </option>
                                                        <option value="Ibu Kandung">Ibu Kandung</option>
                                                        <option value="Ibu Tiri">Ibu Tiri</option>
                                                        <option value="Ibu Angkat">Ibu Angkat</option>
                                                    @elseif($siswa->hubungan_dengan_siswa_ibu == 'Ibu Kandung')
                                                        <option value="">Pilih Hubungan Dengan Ibu Siswa
                                                        </option>
                                                        <option selected value="Ibu Kandung">Ibu Kandung
                                                        </option>
                                                        <option value="Ibu Tiri">Ibu Tiri</option>
                                                        <option value="Ibu Angkat">Ibu Angkat</option>
                                                    @elseif($siswa->hubungan_dengan_siswa_ibu == 'Ibu Tiri')
                                                        <option value="">Pilih Hubungan Dengan Ibu Siswa
                                                        </option>
                                                        <option value="Ibu Kandung">Ibu Kandung</option>
                                                        <option selected value="Ibu Tiri">Ibu Tiri</option>
                                                        <option value="Ibu Angkat">Ibu Angkat</option>
                                                    @else
                                                        <option value="">Pilih Hubungan Dengan Ibu Siswa
                                                        </option>
                                                        <option value="Ibu Kandung">Ibu Kandung</option>
                                                        <option value="Ibu Tiri">Ibu Tiri</option>
                                                        <option selected value="Ibu Angkat">Ibu Angkat</option>
                                                    @endif


                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="mother_name" class="form-label">Pendidikan</label>
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
                                            <div class="mb-3">
                                                <label for="mother_name" class="form-label">Pekerjaan</label>
                                                <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                                    placeholder="Masukkan Pekerjaan Ibu" value={{$siswa->pekerjaan_ibu}}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="income" class="form-label">Penghasilan Per Bulan</label>
                                                <select class="form-control" id="penghasilan_ibu" name="penghasilan_ibu">

                                                    @if($siswa->penghasilan_ibu == null || '')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_ibu == 'Kurang dari Rp. 500.000')
                                                        <option value="">Please select</option>
                                                        <option selected value="Kurang dari Rp. 500.000">Kurang
                                                            dari Rp. 500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_ibu == 'Rp. 500.000 - Rp. 1.000.000')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option selected value="Rp. 500.000 - Rp. 1.000.000">Rp.
                                                            500.000 - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_ibu == 'Rp. 1.000.000 - Rp. 2.000.000')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option selected value="Rp. 1.000.000 - Rp. 2.000.000">
                                                            Rp. 1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_ibu == 'Rp. 2.000.000 - Rp. 3.000.000')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option selected value="Rp. 2.000.000 - Rp. 3.000.000">
                                                            Rp. 2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_ibu == 'Lebih Dari Rp. 3.000.000')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option selected value="Lebih Dari Rp. 3.000.000">Lebih
                                                            Dari Rp. 3.000.000</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary next">Submit</button>




                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button data-mdb-collapse-init class="accordion-button collapsed fw-bold" type="button"
                                        data-mdb-target="#identitas_wali" aria-expanded="false" aria-controls="identitas_wali">
                                        Identitas Wali
                                    </button>
                                </h2>
                                <div id="identitas_wali" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-mdb-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form class="form-walisiswa"
                                            action="{{ route('siswa_form_update_wali_siswa', $siswa->id) }} method=" post"
                                            novalidate="novalidate"> @csrf
                                            @method('POST')

                                            <div class="mb-3">
                                                <label for="father_name" class="form-label">Nama Wali</label>
                                                <input type="text" class="form-control" id="nama_wali" name="nama_wali"
                                                    placeholder="Masukkan Nama wali" value="{{$siswa->nama_wali}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="mother_name" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempat_lahir_wali"
                                                    name="tempat_lahir_wali" placeholder="Masukkan Tempat Lahir Wali"
                                                    value="{{$siswa->tempat_lahir_wali}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="mother_name" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir_wali"
                                                    name="tanggal_lahir_wali" placeholder="Choose a safe one.."
                                                    value="{{$siswa->tanggal_lahir_wali}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="mother_name" class="form-label">Pendidikan</label>
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
                                            <div class="mb-3">
                                                <label for="mother_name" class="form-label">Pekerjaan</label>
                                                <input type="text" class="form-control" id="pekerjaan_wali"
                                                    name="pekerjaan_wali" placeholder="Masukkan Pekerjaan Wali"
                                                    value="{{$siswa->pekerjaan_wali}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="income" class="form-label">Penghasilan Per Bulan</label>
                                                <select class="form-control" id="penghasilan_wali" name="penghasilan_wali">

                                                    @if($siswa->penghasilan_wali == null || '')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_wali == 'Kurang dari Rp. 500.000')
                                                        <option value="">Please select</option>
                                                        <option selected value="Kurang dari Rp. 500.000">Kurang
                                                            dari Rp. 500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_wali == 'Rp. 500.000 - Rp. 1.000.000')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option selected value="Rp. 500.000 - Rp. 1.000.000">Rp.
                                                            500.000 - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_wali == 'Rp. 1.000.000 - Rp. 2.000.000')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option selected value="Rp. 1.000.000 - Rp. 2.000.000">
                                                            Rp. 1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_wali == 'Rp. 2.000.000 - Rp. 3.000.000')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option selected value="Rp. 2.000.000 - Rp. 3.000.000">
                                                            Rp. 2.000.000 - Rp. 3.000.000</option>
                                                        <option value="Lebih Dari Rp. 3.000.000">Lebih Dari Rp.
                                                            3.000.000</option>
                                                    @elseif($siswa->penghasilan_wali == 'Lebih Dari Rp. 3.000.000')
                                                        <option value="">Please select</option>
                                                        <option value="Kurang dari Rp. 500.000">Kurang dari Rp.
                                                            500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000
                                                            - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp.
                                                            1.000.000 - Rp. 2.000.000</option>
                                                        <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp.
                                                            2.000.000 - Rp. 3.000.000</option>
                                                        <option selected value="Lebih Dari Rp. 3.000.000">Lebih
                                                            Dari Rp. 3.000.000</option>
                                                    @endif

                                                </select>
                                            </div>









                                            <button type="submit" class="btn btn-primary next">Submit</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button data-mdb-collapse-init class="accordion-button collapsed fw-bold" type="button"
                                        data-mdb-target="#upload_berkas" aria-expanded="false" aria-controls="upload_berkas">
                                        Dokumen Kelengkapan
                                    </button>
                                </h2>
                                <div id="upload_berkas" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-mdb-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <label class="form-label" for="customFile">Foto Siswa</label>
                                        <img id="preview_image" src=" @if ($siswa->foto_siswa == '')
                                             {{ asset('asset/user.png') }}
                                        @else
                                             {{asset('uploads/foto_siswa/' . $siswa->foto_siswa)}}
                                        @endif" alt="{{ $siswa->nama_siswa }} " style="max-width: 30%; height: auto;"
                                            class="img-thumbnail d-block mx-auto">
                                        <form class="form_upload_foto" action="{{ route('siswa_upload_foto_siswa') }}"
                                            enctype="multipart/form-data" method="post" accept-charset="utf-8"> @csrf
                                            <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                            <input type="file" name="upload_foto" id="upload_foto" accept=".jpg,.jpeg,.png">
                                            <button type="submit" class="btn mt-2 btn-primary btn-block">Upload</button>
                                        </form>



                                        <br>
                                        <label class="form-label" for="customFile">Kartu Keluarga</label>
                                        <img id="preview_kk" src="@if ($siswa->kartu_keluarga == '')
                                             {{ asset('asset/doc.png') }}
                                        @else
                                               {{ asset('uploads/kartu_keluarga/' . $siswa->kartu_keluarga) }}
                                        @endif" alt="{{ $siswa->kartu_keluarga }} "
                                            style="max-width: 30%; height: auto;" class="img-thumbnail d-block mx-auto">
                                        <form class="form_upload_kk" action="{{ route('siswa_upload_kk') }}"
                                            enctype="multipart/form-data" method="post" accept-charset="utf-8"> @csrf
                                            <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                            <input type="file" name="upload_kk" id="upload_kk" accept=".jpg,.jpeg,.png">
                                            <button type="submit" class="btn mt-2 btn-primary btn-block">Upload</button>
                                        </form>


                                        <label class="form-label" for="customFile">Ijazah SD/MI Sederajat</label>
                                        <img id="preview_ijazah" src="  @if ($siswa->ijazah_sd_mi == '')
                                             {{ asset('asset/doc.png') }}
                                        @else
                                             {{ asset('uploads/ijazah/' . $siswa->ijazah_sd_mi) }}
                                        @endif" alt="{{ $siswa->nama_siswa }} " style="max-width: 30%; height: auto;"
                                            class="img-thumbnail d-block mx-auto">
                                        <form class="form_upload_ijazah" action="{{ route('siswa_upload_ijazah') }}"
                                            enctype="multipart/form-data" method="post" accept-charset="utf-8"> @csrf
                                            <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                            <input type="file" name="upload_ijazah" id="upload_ijazah" accept=".jpg,.jpeg,.png">
                                            <button type="submit" class="btn mt-2 btn-primary btn-block">Upload</button>
                                        </form>


                                        <label class="form-label" for="customFile">KTP Orangtua (salah satu)</label>
                                        <img id="preview_ktp" src="@if ($siswa->ktp_orang_tua == '')
                                             {{ asset('asset/doc.png') }}
                                        @else
                                             {{ asset('uploads/ktp/' . $siswa->ktp_orang_tua) }}
                                        @endif" alt="{{ $siswa->nama_siswa }} " style="max-width: 30%; height: auto;"
                                            class="img-thumbnail d-block mx-auto">
                                        <form class="form_upload_ktp" action="{{ route('siswa_upload_ktp') }}"
                                            enctype="multipart/form-data" method="post" accept-charset="utf-8"> @csrf
                                            <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                            <input type="file" name="upload_ktp" id="upload_ktp" accept=".jpg,.jpeg,.png">
                                            <button type="submit" class="btn mt-2 btn-primary btn-block">Upload</button>
                                        </form>

                                        {{-- <button type="submit" class="btn btn-primary mt-2 next">Submit</button> --}}

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button data-mdb-collapse-init class="accordion-button fw-bold" type="button"
                                        data-mdb-target="#selesai" aria-expanded="true" aria-controls="selesai">
                                        Tahap Akhir
                                    </button>
                                </h2>
                                <div id="selesai" class="accordion-collapse collapse " aria-labelledby="headingOne"
                                    data-mdb-parent="#accordionExample">
                                    <div class="accordion-body">


                                        <strong>Klik Selesai Jika Sudah mengisi Formulir!</strong> <br>
                                        Jika Telah Menyelesaikan Formulir yang telah ada silakan klik Selesai di bawah ini untuk
                                        melanjutkan ke proses validasi oleh admin


                                        <form class="form-status" action="{{ route('siswa_update_status', $siswa->id) }}"
                                            method="post"> @csrf

                                            <input type="hidden" name="status_selesai" value="Sudah Selesai">

                                            <button type="submit" class="btn btn-primary next">Submit</button>

                                        </form>



                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif



                </div>
            </div>

        </div>





    </div>




    {{-- JS JQUERY --}}
    {{-- toastr --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- toastr --}}
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            // Function to handle AJAX form submission
            function handleFormSubmission(formId, modalId = null) {
                $(formId).on('submit', function (event) {
                    event.preventDefault(); // Prevent the default form submission

                    var formData = $(this).serialize(); // Serialize form data

                    $.ajax({
                        url: $(this).attr('action'), // Use the form's action attribute
                        type: 'POST',
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
                        },
                        success: function (response) {
                            // Display success notification
                            toastr.success(response.message);
                            if (modalId) {
                                $(modalId).modal('hide'); // Hide the modal if provided
                            }
                        },
                        error: function (xhr) {
                            // Handle error response
                            if (xhr.status === 422) { // Check for validation errors
                                var errors = xhr.responseJSON.errors;
                                if (errors) {
                                    $.each(errors, function (key, value) {
                                        toastr.error(value[0]); // Display each error message
                                    });
                                } else {
                                    toastr.error('An error occurred while processing the request.');
                                }
                            } else {
                                toastr.error('An unexpected error occurred.');
                            }
                        }
                    });
                });
            }

            // Handle password change form submission
            handleFormSubmission('#changePasswordForm', '#pengaturan_akun');

            // Handle API sekolah indonesia
            $('#npsn_sekolah_asal').on('blur', function () {
                const npsn = $(this).val(); // Ambil nilai NPSN yang baru

                if (npsn) {
                    const apiUrl = `https://api-sekolah-indonesia.vercel.app/sekolah?npsn=${npsn}`;

                    $.ajax({
                        url: apiUrl,
                        method: 'GET',
                        success: function (response) {
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
                        error: function () {
                            // alert('Terjadi kesalahan saat mengambil data dari API.');
                        }
                    });
                }
            });

            // Fetch provinces
            $.get('/get-provinces', function (data) {
                $.each(data, function (key, value) {
                    var selected = (value.code == '{{ $siswa->alamat_provinsi }}') ? 'selected' : '';
                    $('#provinsi_siswa').append('<option value="' + value.code + '" ' + selected + '>' + value.name + '</option>');
                });

                // Trigger change event to load cities if province is already selected
                if ('{{ $siswa->alamat_provinsi }}') {
                    $('#provinsi_siswa').trigger('change');
                }
            });

            // Province change event
            $('#provinsi_siswa').change('change click touchstart', function () {
                var province_id = $(this).val();
                $('#kabupaten_siswa').empty().append('<option value="">Please select</option>');
                $('#kecamatan_siswa').empty().append('<option value="">Please select</option>');
                $('#desa_kelurahan_siswa').empty().append('<option value="">Please select</option>');

                if (province_id) {
                    $.get('/get-cities?province_code=' + province_id, function (data) {
                        $.each(data, function (key, value) {
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
            $('#kabupaten_siswa').change('change click touchstart', function () {
                var city_id = $(this).val();
                $('#kecamatan_siswa').empty().append('<option value="">Please select</option>');
                $('#desa_kelurahan_siswa').empty().append('<option value="">Please select</option>');

                if (city_id) {
                    $.get('/get-districts?city_code=' + city_id, function (data) {
                        $.each(data, function (key, value) {
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
            $('#kecamatan_siswa').change('change click touchstart', function () {
                var district_id = $(this).val();
                $('#desa_kelurahan_siswa').empty().append('<option value="">Please select</option>');

                if (district_id) {
                    $.get('/get-villages?district_code=' + district_id, function (data) {
                        $.each(data, function (key, value) {
                            var selected = (value.code == '{{ $siswa->alamat_desa }}') ? 'selected' : '';
                            $('#desa_kelurahan_siswa').append('<option value="' + value.code + '" ' + selected + '>' + value.name + '</option>');
                        });
                    });
                }
            });

            // Handle form submissions for various forms
            handleFormSubmission('.form-identitassiswa1');
            handleFormSubmission('.form-identitassiswa2');
            handleFormSubmission('.form-alamat_siswa');
            handleFormSubmission('.form-pendidikan_siswa');
            handleFormSubmission('.form-ortusiswa');
            handleFormSubmission('.form-walisiswa');
            // handleFormSubmission('.form-status');

            // Handle file upload forms
            function handleFileUpload(formId, previewId) {
                $(formId).on('submit', function (event) {
                    event.preventDefault(); // Prevent the default form submission

                    var formData = new FormData(this); // Create FormData object

                    $.ajax({
                        url: $(this).attr('action'), // Use the form action URL
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            toastr.success('File uploaded successfully!');
                            // Optionally, update the image source to show the new image
                            $(previewId).attr('src', response.imageUrl);
                        },
                        error: function (xhr) {
                            if (xhr.status === 422) { // Check for validation errors
                                var errors = xhr.responseJSON.errors;
                                if (errors) {
                                    $.each(errors, function (key, value) {
                                        toastr.error(value[0]); // Display each error message
                                    });
                                } else {
                                    toastr.error('An error occurred while uploading the file.');
                                }
                            } else {
                                toastr.error('An unexpected error occurred.');
                            }
                        }
                    });
                });
            }

            // Handle file upload for foto
            $('#upload_foto').on('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#preview_image').attr('src', e.target.result); // Set the src of the img tag to the uploaded image
                    }
                    reader.readAsDataURL(file); // Convert the file to a data URL
                }
            });
            handleFileUpload('.form_upload_foto', '#preview_image');

            // Handle file upload for KK
            $('#upload_kk').on('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#preview_kk').attr('src', e.target.result); // Set the src of the img tag to the uploaded image
                    }
                    reader.readAsDataURL(file); // Convert the file to a data URL
                }
            });
            handleFileUpload('.form_upload_kk', '#preview_kk');

            // Handle file upload for Ijazah
            $('#upload_ijazah').on('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#preview_ijazah').attr('src', e.target.result); // Set the src of the img tag to the uploaded image
                    }
                    reader.readAsDataURL(file); // Convert the file to a data URL
                }
            });
            handleFileUpload('.form_upload_ijazah', '#preview_ijazah');

            // Handle file upload for KTP
            $('#upload_ktp').on('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#preview_ktp').attr('src', e.target.result); // Set the src of the img tag to the uploaded image
                    }
                    reader.readAsDataURL(file); // Convert the file to a data URL
                }
            });
            handleFileUpload('.form_upload_ktp', '#preview_ktp');
        });

    </script>


    {{-- JS JQUERY --}}
    {{-- sweet alert --}}

    <script>
        document.querySelector('.form-status').addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan bisa mengubah data setelah submit!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Selesai!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>
    {{-- sweet alert --}}


@endsection
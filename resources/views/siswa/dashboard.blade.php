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
                    <div class="row justify-content-center">
                        <div class="col-4">
                            One of two columns
                        </div>
                        <div class="col-4">
                            One of two columns
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
                                <a data-mdb-tab-init class="nav-link active" id="v-tabs-home-tab" href="#v-tabs-home"
                                    role="tab" aria-controls="v-tabs-home" aria-selected="true">Home</a>
                                <a data-mdb-tab-init class="nav-link" id="v-tabs-profile-tab" href="#v-tabs-profile"
                                    role="tab" aria-controls="v-tabs-profile" aria-selected="false">Profile</a>
                                <a data-mdb-tab-init class="nav-link" id="v-tabs-messages-tab" href="#v-tabs-messages"
                                    role="tab" aria-controls="v-tabs-messages" aria-selected="false">Messages</a>
                            </div>
                            <!-- Tab navs -->
                        </div>

                        <div class="col-9">
                            <!-- Tab content -->
                            <div class="tab-content" id="v-tabs-tabContent">
                                <div class="tab-pane fade show active" id="v-tabs-home" role="tabpanel"
                                    aria-labelledby="v-tabs-home-tab">
                                    Home content
                                </div>
                                <div class="tab-pane fade" id="v-tabs-profile" role="tabpanel"
                                    aria-labelledby="v-tabs-profile-tab">
                                    Profile content
                                </div>
                                <div class="tab-pane fade" id="v-tabs-messages" role="tabpanel"
                                    aria-labelledby="v-tabs-messages-tab">
                                    Messages content
                                </div>
                            </div>
                            <!-- Tab content -->
                        </div>
                    </div>
                </div>
            </div>

        </div>





    </div>
@endsection
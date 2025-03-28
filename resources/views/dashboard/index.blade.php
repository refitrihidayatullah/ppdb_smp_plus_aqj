@extends('layout.main')

@section('title', 'Dashboard -  SPMB SMPP Al-Qodiri Jember')

@section('content')

    <div class="content-body" style="min-height: 798px;">


        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4> Dashboard </h4>
                            <hr>

                            <div class="row">
                                <div class="col-3">
                                    <div class="card card-widget">
                                        <div class="card-body bg-primary">
                                            <div class="media">
                                                <span class="card-widget__icon"><i class="fa-solid fa-file"></i></span>
                                                <div class="media-body">
                                                    <h2 class="card-widget__title">{{ $data['hitung_semua_siswa'] }}</h2>
                                                    <h5 class="card-widget__subtitle">Siswa Terdaftar</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="card card-widget">
                                        <div class="card-body bg-warning">
                                            <div class="media">
                                                <span class="card-widget__icon"><i
                                                        class="fa-regular fa-hourglass-half"></i></span>
                                                <div class="media-body">
                                                    <h2 class="card-widget__title">{{ $data['menunggu_validasi'] }}</h2>
                                                    <h5 class="card-widget__subtitle">Menunggu Validasi</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="card card-widget">
                                        <div class="card-body bg-success ">
                                            <div class="media">
                                                <span class="card-widget__icon"><i
                                                        class="fa-solid fa-check-double"></i></span>
                                                <div class="media-body">
                                                    <h2 class="card-widget__title">{{ $data['sudah_validasi'] }}</h2>
                                                    <h5 class="card-widget__subtitle">Sudah Tervalidasi</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-3">
                                    <div class="card card-widget">
                                        <div class="card-body gradient-9">
                                            <div class="media">
                                                <span class="card-widget__icon"><i class="icon-ghost"></i></span>
                                                <div class="media-body">
                                                    <h2 class="card-widget__title">420</h2>
                                                    <h5 class="card-widget__subtitle">Threats</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            {{-- <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Asperiores repellendus
                                molestiae exercitationem voluptatem tempora quo dolore nostrum dolor consequuntur itaque,
                                alias fugit. Architecto rerum animi velit, beatae corrupti quos nam saepe asperiores aliquid
                                quae culpa ea reiciendis ipsam numquam laborum aperiam. Id tempore consequuntur velit vitae
                                corporis, aspernatur praesentium ratione!</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>


@endsection

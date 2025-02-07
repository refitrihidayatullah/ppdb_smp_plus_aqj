@extends('layout.main')

@section('title', 'Dashboard -  SPMB SMPP Al-Qodiri Jember')

@section('content')




<div class="content-body" style="min-height: 1110px;">




    <div class="container-fluid mt-3">
        <div class="alert alert-success">
            Selamat Datang <span class="font-weight-bold">
                Ahmad Affandi            </span> <br>
            Anda login sebagai akses ADMIN

        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card card-widget">
                    <div class="card-body gradient-4">
                        <div class="media">
                            <span class="card-widget__icon"><i class="fa-solid fa-graduation-cap" aria-hidden="true"></i></span>
                            <div class="media-body">
                                <h2 class="card-widget__title">18</h2>
                                <h5 class="card-widget__subtitle">Jumlah Siswa Terdaftar</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card card-widget">
                    <div class="card-body gradient-2">
                        <div class="media">
                            <span class="card-widget__icon"><i class="fa-solid fa-rotate" aria-hidden="true"></i></span>
                            <div class="media-body">
                                <h2 class="card-widget__title">15</h2>
                                <h5 class="card-widget__subtitle">Siswa Belum Terverifikasi</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card card-widget">
                    <div style="background-image: linear-gradient(230deg, #62c750, #16e35f); " class="card-body">
                        <div class="media">
                            <span class="card-widget__icon"><i class="fa-solid fa-check" aria-hidden="true"></i></span>
                            <div class="media-body">
                                <h2 class="card-widget__title">3</h2>
                                <h5 class="card-widget__subtitle">Siswa Sudah Terverifikasi</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sebaran Berdasarkan Jenis Kelamin</h4>
                        <div id="gender-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="342" version="1.1" width="727.094" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.953125px; top: -0.265625px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="19.5" y="269.5934621785039" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9999868367070235">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M32,269.5934621785039H702.094" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="19.5" y="208.44509663387794" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.999997756924813">2</tspan></text><path fill="none" stroke="#aaaaaa" d="M32,208.44509663387794H702.094" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="19.5" y="147.29673108925195" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9999934183535117">4</tspan></text><path fill="none" stroke="#aaaaaa" d="M32,147.29673108925195H702.094" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="19.5" y="86.14836554462596" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9999967091767417">6</tspan></text><path fill="none" stroke="#aaaaaa" d="M32,86.14836554462596H702.094" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="19.5" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">8</tspan></text><path fill="none" stroke="#aaaaaa" d="M32,25H702.094" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="534.5705" y="282.0934621785039" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.7071,-0.7071,0.7071,0.7071,-52.4051,475.2375)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9999868367070235">2024</tspan></text><text x="199.5235" y="282.0934621785039" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.7071,-0.7071,0.7071,0.7071,-150.538,238.3235)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9999868367070235">2023</tspan></text><rect x="73.880875" y="239.01927940619092" width="124.14262500000001" height="30.57418277231298" rx="0" ry="0" fill="#007bff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="201.0235" y="269.5934621785039" width="124.14262500000001" height="0" rx="0" ry="0" fill="#dc3545" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="408.92787500000003" y="116.72254831693897" width="124.14262500000001" height="152.87091386156493" rx="0" ry="0" fill="#007bff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="536.0705" y="25" width="124.14262500000001" height="244.5934621785039" rx="0" ry="0" fill="#dc3545" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg><div class="morris-hover morris-default-style" style="left: 126.828px; top: 129px; display: none;"><div class="morris-hover-row-label">2023</div><div class="morris-hover-point" style="color: #007bff">
  LAKI-LAKI:
  1
</div><div class="morris-hover-point" style="color: #dc3545">
  PEREMPUAN:
  0
</div></div></div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card card-widget">
                    <div class="card-body">
                        <h4 class="card-title">Sebaran Berdasarkan Kompetensi Keahlian</h4>
                        <div id="chart"></div>

                    </div>
                </div>

            </div>

        </div>
{{--
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Detail Kuota Pendaftaran Tahun 2025</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kompetensi Keahlian</th>
                                <th>Status</th>
                                <th>Jumlah Kuota Tahun ini</th>
                                <th>Jumlah Kuota terpenuhi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}

    </div>
    <!-- #/ container -->
</div>



{{--
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Products Sold</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Net Profit</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">$ 8541</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">New Customers</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Customer Satisfaction</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">99%</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>





                    </div>


            </div>
        </div>

        </div>

    </div> --}}
        <!--**********************************
            Content body end
        ***********************************-->




@endsection

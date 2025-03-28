@extends('layout.main')

@section('title', 'Ekspor Data Siswa - SPMB SMPP Al-Qodiri Jember')

@section('content')

    <div class="content-body" style="min-height: 1110px;">



        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Ekspor Data Siswa </h4>
                            <hr>
                            <div class="form-validation">
                                <form class="form-valide" action="{{ route('ekspor_excel_process') }}" method="post"
                                    novalidate="novalidate">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="tahun_daftar">Pilih Tahun
                                            Pendaftaran<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="tahun_daftar" name="tahun_daftar">
                                                <option value="">Pilih Tahun Pendaftaran</option>
                                                @foreach ($tahun as $th)
                                                    <option value="{{ $th->tahun_daftar }}">{{ $th->tahun_daftar }}</option>

                                                @endforeach

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
        <!-- #/ container -->
    </div>



@endsection

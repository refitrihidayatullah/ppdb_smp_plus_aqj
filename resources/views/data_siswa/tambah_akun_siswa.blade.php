@extends('layout.main')

@section('title', 'Tambah Akun Siswa - SPMB SMPP Al-Qodiri Jember')

@section('content')
{{-- ini adalah konten --}}
<div class="content-body" style="min-height: 1110px;">

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Akun Siswa</h4>
                        <hr>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="form-validation">
                           <form class="form-valide" action="{{ route('store_siswa') }}" method="post" novalidate="novalidate">
    @csrf
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="val-username">Nama Siswa <span class="text-danger">*</span></label>
        <div class="col-lg-6">
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukkan Nama Siswa" value="{{ old('nama_siswa') }}">
            @error('nama_siswa')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
        <div class="col-lg-6">
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Siswa" value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span></label>
        <div class="col-lg-6">
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="val-confirm-password">Konfirmasi Password <span class="text-danger">*</span></label>
        <div class="col-lg-6">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Masukkan Konfirmasi Password">
            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
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

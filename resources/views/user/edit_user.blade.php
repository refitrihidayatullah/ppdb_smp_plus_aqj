@extends('layout.main')

@section('title', 'Edit Data User - SPMB SMPP Al-Qodiri Jember')

@section('content')
<div class="content-body" style="min-height: 798px;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Edit Data User</h4>
                        <hr>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('user.update', $user->id) }}" method="post">
                                @csrf
                                @method('PUT') <!-- Menggunakan metode PUT untuk update -->
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Nama Lengkap <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" value="{{ old('nama_lengkap', $user->name) }}">
                                        @error('nama_lengkap')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email disini" value="{{ old('email', $user->email) }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">No.Hp <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No. HP Disini!" value="{{ old('no_hp', $user->no_hp) }}">
                                        @error('no_hp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Baru (Kosongkan jika tidak ingin mengubah)">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-confirm-password">Konfirmasi Password <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasikan Password Baru (Kosongkan jika tidak ingin mengubah)">
                                        @error('konfirmasi_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
@endsection

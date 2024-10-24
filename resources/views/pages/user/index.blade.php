@extends('layouts.app')

@section('title', 'Data User')

@section('content')
 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data User</h4>
                    <hr>

                    <!-- <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary mb-3"> +  Tambah User</a> -->
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#TambahUser" data-whatever="@mdo"><i class="fa-solid fa-plus"></i> Tambah User</button>
                    <!-- <a href="{{ route('user.create') }}" class="btn btn-sm btn-success mb-3"> Tambah User</a> -->
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>No. HP</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->level }}</td>
                                        <td>{{ $user->no_hp_panitia }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                           <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="confirmDelete(event, 'delete-form-{{ $user->id }}')">Hapus</a>
<form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>  



<!-- sweet alert -->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>


function confirmDelete(event, formId) {
    event.preventDefault(); // Menghentikan form dari pengiriman langsung

    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data ini akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus saja!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(formId).submit(); // Submit form secara manual jika pengguna mengkonfirmasi
        }
    });
}
</script>



<!-- modal tambah user -->
    
         <div class="modal fade" id="TambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User Admin/Panitia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                        <div class="col">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="col">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                        <div class="col">
                            <select id="level" class="form-control @error('level') is-invalid @enderror" name="level" required>
                                <option value="">Pilih Role</option>
                                <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="panitia" {{ old('level') == 'panitia' ? 'selected' : '' }}>Panitia</option>
                            </select>
                            @error('level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_hp_panitia" class="col-md-4 col-form-label text-md-right">{{ __('No HP') }}</label>
                        <div class="col">
                            <input id="no_hp_panitia" type="text" class="form-control @error('no_hp_panitia') is-invalid @enderror" name="no_hp_panitia" value="{{ old('no_hp_panitia') }}" required autocomplete="no_hp_panitia">
                            @error('no_hp_panitia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password') }}</label>
                        <div class="col">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Tambah User') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal tambah user -->


<!-- modal edit user -->
    




<!-- modal edit user -->

@endsection
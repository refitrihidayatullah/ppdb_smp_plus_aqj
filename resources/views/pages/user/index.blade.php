@extends('layouts.app')

@section('title', 'Data User')

@section('content')
 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data User</h4>
                    <hr>
                    <!-- <a href="{{ route('user.create') }}" class="btn btn-sm btn-success mb-3">Tambah User</a> -->
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


@endsection
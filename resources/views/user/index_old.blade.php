@extends('layout.main')

@section('title', 'Data User -  SPMB SMPP Al-Qodiri Jember')

@section('content')
{{-- ini adalah konten --}}

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data User</h4>
                                <button type="button"  data-toggle="modal" data-target="#addUserModal" class="btn btn-sm mb-1 btn-primary">Tambah User</button>

                                <hr>
                                <div class="table-responsive">
                                    <table id="userTable" class="table table-striped table-bordered zero-configuration" id="userTable">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>No. Hp</th>
                                                <th>Email</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- User data will be populated here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

<!-- Modal Tambah User -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"  id="addUserModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addUserForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No. Hp</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


        {{-- modal ubah user --}}

        <!-- Modal Ubah Pengguna -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Ubah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserForm">
                    @csrf
                    <input type="hidden" id="userId" name="id">
                    <div class="form-group">
                        <label for="userName">Nama</label>
                        <input type="text" class="form-control" id="userName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="userPhone">No. Hp</label>
                        <input type="text" class="form-control" id="userPhone" name="no_hp" required>
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="email" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="updateUserBtn">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

        {{-- modal ubah user --}}

        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


        <script>



            $(document).ready(function() {
    var table = $('#userTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('get_user') }}',
            type: 'GET',
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'no_hp', name: 'no_hp' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

    // Handle edit user
    $('#userTable').on('click', '.edit-user', function() {
        var userId = $(this).data('id');
        // Lakukan AJAX untuk mendapatkan data pengguna berdasarkan ID
        $.ajax({
            url: '/user/' + userId + '/edit', // Pastikan Anda memiliki route ini
            type: 'GET',
            success: function(data) {
                // Tampilkan data di form ubah pengguna
                $('#editUserModal').modal('show'); // Tampilkan modal
                $('#userId').val(data.id);
                $('#userName').val(data.name);
                $('#userPhone').val(data.no_hp);
                $('#userEmail').val(data.email);
            }
        });
    });

 // Event listener untuk tombol "Simpan Perubahan"
    $('#updateUserBtn').on('click', function() {
        var userId = $('#userId').val();
        var formData = $('#editUserForm').serialize(); // Ambil data dari form

        $.ajax({
            url: '/user/' + userId, // Ganti dengan URL update yang sesuai
            type: 'PUT',
            data: formData,

            success: function(response) {
                $('#editUserModal').modal('hide'); // Sembunyikan modal
                table.ajax.reload(); // Reload tabel
                alert('Data pengguna berhasil diperbarui!'); // Tampilkan pesan sukses
            },
            error: function(xhr) {
                alert('Terjadi kesalahan saat memperbarui data pengguna.');
            }
        });
    });


    // Handle delete user
    $('#userTable').on('click', '.delete-user', function() {
      var id = $(this).data('id'); // Ambil ID pengguna dari data attribute
        var el = $(this); // Simpan referensi ke elemen tombol

        // Konfirmasi penghapusan
        if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
            $.ajax({
                    url: '{{ route('user.destroy', '') }}/' + id, // Ganti dengan route yang sesuai
                type: 'DELETE',
                dataType: 'JSON',
                data: {
                    '_token': '{{ csrf_token() }}', // Sertakan token CSRF
                },
                success: function(response) {
                    // Hapus baris dari tabel
                    table.row(el.closest('tr')).remove().draw();
                    console.log('DELETED');
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    });
});

        </script>




@endsection

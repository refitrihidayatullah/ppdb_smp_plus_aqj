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





        {{-- modal ubah user --}}

        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- sweetalert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- sweetalert --}}

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
                error: function(xhr, error, code) {
                    console.error("Error loading data: ", error);
                    alert("Terjadi kesalahan saat memuat data. Silakan coba lagi.");
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'no_hp', name: 'no_hp' },
                { data: 'email', name: 'email' },
                { data: 'action', name: 'action', orderable: false, searchable: false } // Jika Anda memiliki kolom aksi
            ],
            order: [[1, 'asc'], [2, 'asc']], // Mengurutkan berdasarkan kolom name dan no_hp
            pageLength: 10, // Menentukan jumlah baris per halaman
            lengthMenu: [10, 25, 50, 100], // Opsi untuk jumlah baris per halaman
        });
    });

     $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var userId = $(this).data('id');
            var form = $('#delete-form-' + userId);

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

</script>




@endsection

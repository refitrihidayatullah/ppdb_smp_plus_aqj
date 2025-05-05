@extends('layout.main')

@section('title', 'Data Siswa Terdaftar - SPMB SMPP Al-Qodiri Jember')

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
                                <h4 class="card-title">Data Siswa</h4>

                                <hr>
                                <div class="table-responsive">
                                    <table id="userTable" class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <th>Sekolah Asal</th>
                                                <th>Status Selesai dan Validasi</th>
                                                <th>Aksi</th> <!-- Tambahkan kolom aksi jika diperlukan -->
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

        <script>
            $(document).ready(function() {
                var table = $('#userTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('get_siswa') }}',
                        type: 'GET',
                        error: function(xhr, error, code) {
                            console.error("Error loading data: ", error);
                            alert("Terjadi kesalahan saat memuat data. Silakan coba lagi.");
                        }
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'foto', name: 'foto', orderable: false, searchable: false }, // Kolom foto
                        { data: 'nama_siswa', name: 'nama_siswa' }, // Kolom nama
                        // { data: 'tempat_lahir' , name: 'tempat_lahir' }, // Kolom tempat lahir
                          { data: 'tempat_tanggal_lahir', name: 'tempat_tanggal_lahir', orderable: false, searchable: false }, // Kolom foto

                        { data: 'nama_sekolah_asal', name: 'nama_sekolah_asal' }, // Kolom sekolah asal
                         { data: 'status', name: 'status', orderable: false, searchable: false }, // Kolom foto
                        { data: 'action', name: 'action', orderable: false, searchable: false } // Kolom aksi
                    ],
                    order: [[2, 'asc']], // Mengurutkan berdasarkan kolom nama
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
